//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		 var deleteID = $(this).data('id');
		 $(".alert_modal_body #modal_id").val( deleteID );
	});
	$(document).on("click", "#AttendancSheet", function () {
        var deleteID = $(this).data('id');
        $(".attendanc_body #modal_id").val( deleteID );
        var branchID = $(this).data('branch');
        $(".attendanc_body #branch_id").val( branchID );
   });
  $(document).on("click", "#publish", function () {
		 var publishID = $(this).data('id');
		 $(".alert_modal_body #modal_id").val( publishID );
	});

  $(document).on("click", "#unpublish", function () {
		 var unPublishID = $(this).data('id');
		 $(".alert_modal_body #modal_id").val( unPublishID );
	});

  $(document).on("click", "#restore", function () {
		 var restoreID = $(this).data('id');
		 $(".alert_modal_body #modal_id").val( restoreID );
	});

});

//Success and Error Message Timeout Code Start
setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
 },5000);

setTimeout(function() {
    $('.alerterror').slideUp(1000);
 },10000);

//print code start
$(document).ready(function(){
    $('.btnPrint').printPage();
});

//datatable code start
$(document).ready(function() {
  $('#myTable').DataTable();

  $('#alltableinfo').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": false,
    "info": true,
    "autoWidth": false
  });

  $('#allTableDesc').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "order": [[ 0, "desc" ]],
    "info": true,
    "autoWidth": false
  });
});

//Datepicker setting code start
 $(function(){
	 $('#birththday').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });
	 $('#date_one').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });

	 $('#date_two').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });
	 $('#date_three').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });
	 $('#date_four').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });
	 $('#date_five').datepicker({
		  autoclose: true,
		  format: 'yyyy-mm-dd',
		  todayHighlight: true
	 });
});
