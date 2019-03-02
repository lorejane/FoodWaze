<main class="main-container bg-pale-purple">

<header class="header bg-pale-purple">
<div class="container bg-img h-250px" style="background-image: url(../pics/categories.png)" >
  <div class="header-info">

  </div>
  </div>

   <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
                  <circle class="circle" cx="25" cy="25" r="25"></circle>
                </svg>
                </div>
    </div>

</div>
</header>
    <div class="col-12">
    <div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
        <div class="table-responsive" style="padding-top:10px;">
          <table class="table table-lg table-bordered" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Customer/GenerateReceipts") ?>">
            <thead>
              <tr>
                <th>Order Id</th>
                <th>Date/Time</th>
                <th>Action</th>
              </tr>
            </thead>
          </table> 
        </div>
    </div>
  
  </div>
  


<?php include("ReceiptModal.php");?>

<script>
  $(document).ready(function () {
    Receipt.init();
  });

  var Receipt = {
    init: function () {
      $('.modal').on('hidden.bs.modal', function () {
        Receipt.reset();
      });

    },

    reset: function () {
      $('#Receipt-table').DataTable().ajax.reload();
    }
  }
</script>