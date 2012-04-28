<?php

namespace Fuel\Migrations;

class Create_lots
{
	public function up()
	{
		\DBUtil::create_table('lots', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'auction_id' => array('constraint' => 11, 'type' => 'int'),
			'sku' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('lots');
	}
}