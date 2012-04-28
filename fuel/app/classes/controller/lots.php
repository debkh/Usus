<?php
class Controller_Lots extends Controller_Template 
{

	public function action_index($id = null)
	{
        //$iLotID = Input::get('iLotID',0);
        if ($id){
		    $data['lots'] = Model_Lot::find('all');
        } else {
            $data['lots'] = false;
        }
        $this->template->title = "Lots";
        $this->template->content = View::forge('lots/index', $data);
	}

    public function action_list($id = null)
    {
        $data["iAuctionID"] = $id;
        if ($id){
            $data['lots'] = Model_Lot::find('all',array('where' => array('auction_id' => $id), 'limit' => 10,));


        } else {
            $data['lots'] = false;
        }
        $this->template->title = "Lots";
        $this->template->content = View::forge('lots/index', $data);
    }

	public function action_view($id = null)
	{
		$data['lot'] = Model_Lot::find($id);

		$this->template->title = "Lot";
		$this->template->content = View::forge('lots/view', $data);

	}

	public function action_create($id = null)
	{
        $this->template->set_global('iAuctionID',$id);
		if (Input::method() == 'POST') // if data send from form
		{
			$val = Model_Lot::validate('create');
			
			if ($val->run())
			{
                $iAuctionID = Input::post('auction_id',0);
				$lot = Model_Lot::forge(array(
					'auction_id' => $iAuctionID,
					'sku' => Input::post('sku'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));
                if ($iAuctionID){
                        if ($lot and $lot->save())
                        {
                            Session::set_flash('success', 'Added lot #'.$lot->id.'.');

                            Response::redirect('lots');
                        }
                        else
                        {
                            Session::set_flash('error', 'Could not save lot.');
                        }
                } else {
                    Session::set_flash('error', 'You must choose auction first!');
                }

			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}


		$this->template->title = "Lots";
		$this->template->content = View::forge('lots/create');

	}

	public function action_edit($id = null)
	{
		$lot = Model_Lot::find($id);
		$val = Model_Lot::validate('edit');

		if ($val->run())
		{
			$lot->auction_id = Input::post('auction_id');
			$lot->sku = Input::post('sku');
			$lot->name = Input::post('name');
			$lot->description = Input::post('description');

			if ($lot->save())
			{
				Session::set_flash('success', 'Updated lot #' . $id);

				Response::redirect('lots');
			}

			else
			{
				Session::set_flash('error', 'Could not update lot #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$lot->auction_id = $val->validated('auction_id');
				$lot->sku = $val->validated('sku');
				$lot->name = $val->validated('name');
				$lot->description = $val->validated('description');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('lot', $lot, false);
		}

		$this->template->title = "Lots";
		$this->template->content = View::forge('lots/edit');

	}

	public function action_delete($id = null)
	{
		if ($lot = Model_Lot::find($id))
		{
			$lot->delete();

			Session::set_flash('success', 'Deleted lot #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete lot #'.$id);
		}

		Response::redirect('lots');

	}


}