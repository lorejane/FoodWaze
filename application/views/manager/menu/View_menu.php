<div class="col-sm-10">
    <h3>Menu</h3>

    <form class="form" role="form" action="<?php echo base_url('manager/Meal')?>" method="post">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Menu ID" style="width:30%;" readonly value="<?php echo $menu->MenuId; ?>"  >
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Name" style="width:30%;" value="<?php echo $menu->Name; ?>" >
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Price" style="width:30%;" value="<?php echo $menu->Price; ?>">
    </div>
        <button name="cancel" type="cancel" class="btn btn-warning" >Cancel</button>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>