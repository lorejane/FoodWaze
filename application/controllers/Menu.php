 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('_BaseController.php');
use Respect\Validation\Validator as v;
class Menu extends _BaseController {

    public function Get($id){        
        echo $this->convert($this->ManagerModel->_getMenu($id));
    }

    public function SaveMeal(){        
        $this->MealModel->save($this->input->post('meal'));
    }

    public function SavePasta(){        
        $this->PastaModel->save($this->input->post('pasta'));
    }    

    public function SaveDessert(){        
        $this->DessertModel->save($this->input->post('dessert'));
    }

    public function SaveDrinks(){        
        $this->DrinksModel->save($this->input->post('drinks'));
    }  

    //DisplayTableForMeal M E A L
    public function getMeal(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenuMeal() as $data){                 
           $json .= '['
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
             .'"<a onclick = \"Meal_Modal.edit('.$data->MenuId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';            
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }

    public function getPasta(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenuPasta() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                .'"<a onclick = \"Pasta_Modal.edit('.$data->MenuId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }    

    public function getDessert(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenuDessert() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                .'"<a onclick = \"Dessert_Modal.edit('.$data->MenuId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    public function getDrinks(){
        $json = '{ "data": [';
        foreach($this->ManagerModel->getMenuDrinks() as $data){                 
            $json .= '['                
                .'"'.$data->MenuId.'",'
                .'"'.$data->Name.'",'
                .'"'.$data->Price.'",'                
                .'"<a onclick = \"Drinks_Modal.edit('.$data->MenuId.');\"  class=\"btn btn-info\" >Update</a><a href=\"'.base_url('manager/delete_employee/'.$data->MenuId).'\" class=\"btn btn-danger\" >Delete</a>"'
            .']';             
            $json .= ',';
        }
        $json = $this->removeExcessComma($json);
        $json .= ']}';
        echo $json;        
    }
    
	public function delete_meal()
	{
        $u = $this->uri->segment(3);
        $this->Order_model->delete($u);
        redirect('manager/Meal', 'refresh');
	}

    public function delete_pasta()
    {
        $u = $this->uri->segment(3);
        $this->Order_model->delete($u);
        redirect('manager/Pasta', 'refresh');
    }

    public function delete_dessert()
    {
        $u = $this->uri->segment(3);
        $this->Order_model->delete($u);
        redirect('manager/Dessert', 'refresh');
    }

    public function delete_drinks()
    {
        $u = $this->uri->segment(3);
        $this->Order_model->delete($u);
        redirect('manager/Drinks', 'refresh');
    }
    

}    