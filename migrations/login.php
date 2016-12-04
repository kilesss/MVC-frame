<?php
			function tableConfig (){
				$table = array(
					'dropTable' => 'login',
					'engine' => 'MyISAM',
					'encoding' => 'utf8',
					'columns'=> array(
						'id' => array(
							'type' => 'int',
							'size'=> 10,
							'autoIncrement' => 1,
							'notNull'  => 1,
							'primaryKey'  => 1,
							'unsigned'  => 1
						),

						'username' => array(
							'type' => 'varchar',
							'size'=> 100,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0
						),
						'password' => array(
							'type' => 'varchar',
							'size'=> 10,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0

						)
					)
				);
			return $table;
			}
			