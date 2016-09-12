<?php
	$Structure_Controller_Show = new Structure_Controller_Show(
	Core_Entity::factory('Site', CURRENT_SITE));

	$Structure_Controller_Show->xsl(
	Core_Entity::factory('Xsl')->getByName('НАЗВАНИЕ_XSL_ШАБЛОНА') 
	)
	   // Показывать группы информационных систем в карте сайта
	   ->showInformationsystemGroups(FALSE)
	   ->showInformationsystemItems(FALSE)
	   ->menu('4');  // ID меню в структуре
	   
	// Код получения активного пункта для ИС, для магазина - все то же, только Shop
	if (is_object(Core_Page::instance()->object)
	&& get_class(Core_Page::instance()->object) == 'Informationsystem_Controller_Show'){
	   $Structure_Controller_Show->addEntity(
	   Core::factory('Core_Xml_Entity')
		  ->name('informationsystem_group_id')
		  ->value(intval(Core_Page::instance()->object->group))
	   );
	}
	$Structure_Controller_Show->show();
?>