<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('CakeSchema', 'Model');
App::uses('ConnectionManager', 'Model');
class AparnicSliderActivation {

	public function beforeActivation($controller) {
		return true;
	}

	public function onActivation($controller) {
                // create table if not exist
                $this->__createTables();
                // if directory exist aparnic_slider/resized
                $this->__createRequiredFolder();
		return true;
	}
        //----------------------------------------------------------
        private function __createTables() {
            $pluginName ='AparnicSlider';
            $db = ConnectionManager::getDataSource('default');
            $tables = $db->listSources();
            $schema = new CakeSchema(array(
                'name' => $pluginName,
                'path' => APP.'plugin'.DS.$pluginName.DS.'Config'.DS.'Schema',
            ));
            $schema = $schema->load();
            foreach ($schema->tables as $table => $fields) {
                if(!in_array($table, $tables)){
                    $create = $db->createSchema($schema, $table);
                    try {
                        $db->execute($create);
                    } catch (PDOException $e) {
                        die(__('Could not create table: %s', $e->getMessage()));
                    }
                }
            }
        }
        //----------------------------------------------------------
        private function __createRequiredFolder() {
            $aparnicSliderImagePath = 'aparnic_slider';
            $aparnicSliderResizedPath = 'aparnic_slider' . DS . 'resized';
            $bigImagePath = new Folder(WWW_ROOT.$aparnicSliderImagePath);

            if(is_null($bigImagePath->path)){
                $bigImagePath->create(WWW_ROOT.$aparnicSliderImagePath);
                $indexFile = new File(WWW_ROOT.$aparnicSliderImagePath.DS.'index.html', true);
            }
            if(!$bigImagePath->cd('resized')){
                $bigImagePath->create(WWW_ROOT.$aparnicSliderResizedPath);
                $indexFile = new File(WWW_ROOT.$aparnicSliderResizedPath.DS.'index.html', true);
            }
        }
        //----------------------------------------------------------
	public function beforeDeactivation($controller) {
		return true;
	}

	public function onDeactivation($controller) {
                $controller->Croogo->removeAco('AparnicSlider');
		return true;
	}

}
