<main class="main-container bg-pale-purple">

<header class="header bb-3 border-danger h-200px">
        <div class="header-info">
          <h3 class="header-title text-dark">
            <br />
              <br />
            <strong>List of Receipts</strong> 
            <small>This shows the list of all receipts in the previous transactions</small>
          </h3>
        </div>

   <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
                  <circle class="circle" cx="25" cy="25" r="25"></circle>
                </svg>
                </div>
    </div>

</div>
</header>
    <div class="col-sm-12">
    <div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
        <div class="table-responsive" style="padding-top:10px;">
          <table class="table table-lg table-bordered" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Customer/GenerateReceipts") ?>">
            <thead>
              <tr class="by-3 border-yellow fs-20 fw-300">
                <th class=>Date and Time</th>
                <th>Action</th>
              </tr>
            </thead>
          </table> 
        </div>
    </div>
  
  </div>

   <div class="col-2">
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