<?php
class Controller_Auctions extends Controller_Template 
{

	public function action_index()
	{
    	$data['auctions'] = Model_Auction::find('all');
        $data['auctionsCount'] = Model_Auction::count();
		$this->template->title = "Auctions";
		$this->template->content = View::forge('auctions/index', $data);

	}

	public function action_lots($id = null)
	{
		$data['auction'] = Model_Lot::find($id);

		$this->template->title = "Auction";
		$this->template->content = View::forge('auctions/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Auction::validate('create');
			
			if ($val->run())
			{
				$auction = Model_Auction::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'date' => Input::post('date'),
					'config' => Input::post('config'),
				));

				if ($auction and $auction->save())
				{
					Session::set_flash('success', 'Added auction #'.$auction->id.'.');

					Response::redirect('auctions');
				}

				else
				{
					Session::set_flash('error', 'Could not save auction.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Auctions";
		$this->template->content = View::forge('auctions/create');

	}

	public function action_edit($id = null)
	{
		$auction = Model_Auction::find($id);
		$val = Model_Auction::validate('edit');

		if ($val->run())
		{
			$auction->name = Input::post('name');
			$auction->description = Input::post('description');
			$auction->date = Input::post('date');
			$auction->config = Input::post('config');

			if ($auction->save())
			{
				Session::set_flash('success', 'Updated auction #' . $id);

				Response::redirect('auctions');
			}

			else
			{
				Session::set_flash('error', 'Could not update auction #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$auction->name = $val->validated('name');
				$auction->description = $val->validated('description');
				$auction->date = $val->validated('date');
				$auction->config = $val->validated('config');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('auction', $auction, false);
		}

		$this->template->title = "Auctions";
		$this->template->content = View::forge('auctions/edit');

	}

	public function action_delete($id = null)
	{
		if ($auction = Model_Auction::find($id))
		{
			$auction->delete();

			Session::set_flash('success', 'Deleted auction #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete auction #'.$id);
		}

		Response::redirect('auctions');

	}


}