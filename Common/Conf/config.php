<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE'		=>  'Admin',
	#数据库连接
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'lagou',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'la_',    // 数据库表前缀

	//'SHOW_PAGE_TRACE'		=>  'true',   //跟踪 默认false

	//'READ_DATA_MAP'			=>	'true',  //反向映射

	//'LOAD_EXT_FILE'			=>	'phpinfo',  //

    //RBAC  后台管理权限
    //用户组
    'RBAC_ROLES'            =>  array(
                                    1 => '高层领导',
                                    2 => '中层领导',
                                    3 => '基层员工',
    ),
    //用户组 对应的权限数组
    'RABC_AUTHS'            =>  array(
                                    1 => array('*/*'),  //*代表全部 /分割
                                    2 => array('*/*'),
                                    3 => array('*/*'),
      ),


);