<?php
/**
 * Tablesorter extension for Yii.
 *
 * jQuery tablesorter extension for Yii, for turning a standard grid view into a sortable table without page refreshes.
 * Its a wrapper of  https://github.com/Mottie/tablesorter
 *
 * @author Nachi <innovativenachi@gmail.com>
 * @link https://github.com/Mottie/tablesorter
 * @link https://github.com/innovativenachi/tablesorter
 * @version 0.1
 *
 */
class Sorter extends CWidget
{
	//Parameters passed
	private $_options = array(
        'data'    => null,
        'columns'   => null,
        'filters'   => null,
    );
    
    public function init()
	{
		//Table sorter was intialized
	}
	
	//Magic function for get parameters
	public function __get($name) {
        if(array_key_exists($name, $this->_options)) {
            return $this->_options[$name];
        }
        return parent::__get($name);
    }
	
	//Magic function for setting parameters
    public function __set($name, $value) {
        if(array_key_exists($name, $this->_options)) {
            return $this->_options[$name] = $value;
        }
        return parent::__set($name, $value);
    }
	
	//Register CSS and Jquery
	public function registerClientScript()
	{
		$bu = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets/');
        $cs = Yii::app()->clientScript;
        //Intialize CSS
        $cs->registerCssFile($bu . '/css/tablesorter.css');
		$cs->registerCssFile($bu . '/css/tablesorter.pager.css');
		$cs->registerCssFile($bu . '/css/bootstrap.css');
		//Intialize Jquery
		$cs->registerScriptFile($bu . '/js/jquery-1.10.2.js');
		$cs->registerScriptFile($bu . '/js/tablesorter.js');
		$cs->registerScriptFile($bu . '/js/tablesorter.pager.js');
		$cs->registerScriptFile($bu . '/js/tablesorter.widgets.js');
		$cs->registerScriptFile($bu . '/js/tablesorter.widgets-filter-formatter.js');
		$cs->registerScriptFile($bu . '/js/scripts.js');
	}
	
	public function genTable()
	{
		$datas=$this->data;
		if(!empty($datas)) { //for not empty values
		$object=$datas[0];
		$class=get_class($object);
		}
		$count=count($datas);
		echo "Totaly ".$count." results have been found";
		
		//Table start
		echo "<table class='tablesorter-bootstrap'>\n";
		//Table head start
		echo "<thead>\n";
		echo "<tr>\n";
		$filters=$this->filters;
		$i=0;
		foreach($this->columns as $column)
		{
			$find = explode(".", $column);
			if(count($find)>1) {
			echo "<th class='".$filters[$i]."'>".ucfirst($find[1])."</th>";	
			}
			else
			echo "<th class='".$filters[$i]."'>".ucfirst($column)."</th>";
			
			$i++;
		}
		echo "<th class='filter-false'>Actions</th>";
		echo "</tr>\n";
		echo "</thead>\n";
		//Table head end
		
		//Table body start
		echo "<tbody>\n";
		foreach($datas as $data)
		{
			echo "<tr>\n";
			foreach($this->columns as $column)
			{
				$find = explode(".", $column);
				if(count($find)>1) {
					echo "<td>".$data->$find[0]->$find[1]."</td>";	
				}
				else {	
					echo "<td>".$data->$column."</td>";
				}
			}
			//View, Edit and Delete Urls
			$view_url=Yii::app()->controller->createAbsoluteUrl(strtolower($class).'/view',array('id'=>$data->primaryKey));
			$edit_url=Yii::app()->controller->createAbsoluteUrl(strtolower($class).'/update',array('id'=>$data->primaryKey));
			$delete_url=Yii::app()->controller->createAbsoluteUrl(strtolower($class).'/delete',array('id'=>$data->primaryKey));
			
			//View, Edit, Delete Icons (bootstrap)
			echo "<td>   <a class='btn btn-small' href='".$view_url."'><i class='icon-search'></i></a>
				  &nbsp; <a class='btn btn-small' href='".$edit_url."'><i class='icon-edit'></i></a>";
                        if(Yii::app()->user->checkAccess('venta'))
				  echo "&nbsp; <a class='btn btn-small' href='".$delete_url."'><i class='icon-trash'></i></a>";
				  echo "</td>";
			echo "</tr>\n";
		}
		echo "</tbody>\n";
		//Table body end
		
		//Table footer start
		echo "<tfoot>\n";
		echo '<tr>
				<th colspan="7" class="pager form-horizontal">
					<button type="button" class="btn first"><i class="icon-step-backward"></i></button>
					<button type="button" class="btn prev"><i class="icon-arrow-left"></i></button>
					<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
					<button type="button" class="btn next"><i class="icon-arrow-right"></i></button>
					<button type="button" class="btn last"><i class="icon-step-forward"></i></button>
					<select class="pagesize input-mini" title="Select page size">
						<option selected="selected" value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
					</select>
					<select class="pagenum input-mini" title="Select page number"></select>
				</th>
			  </tr>';
		echo "</tfoot>\n";
		//Table footer end
		
		echo "</table>\n";
		//Table end
	}
	
	//Runs after the widget is intialized
	public function run()
	{
		$this->registerClientScript();
		$this->genTable();
	}

}
?>
