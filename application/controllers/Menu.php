 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

   public function view_menu(){
        $this->load->view('include/header');
        $data['menu'] = $this->Order_model->getMenu();
        $this->load->view('manager/menu/View_menu', $data);
        $this->load->view('include/footer');
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