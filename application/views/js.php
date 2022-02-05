<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/chartjs.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/DataTables/datatables.min.js"></script>
<script src="<?php echo base_url()?>assets/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script src="<?php echo base_url()?>assets/Loading-Overlay/waitMe.min.js"></script>
<script src="<?php echo base_url()?>assets/select2/dist/js/select2.min.js"></script>
  <script type="text/javascript">
  	$("#form-buku").hide();
  	$("#form-customer").hide();
  	$("#form-rent").hide();
    function loading() {
      $("#loading").waitMe({
        effect : 'roundBounce',
        text : '',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000',
        maxSize : '',
        waitTime : -1,
        textPos : 'vertical',
        fontSize : '',
        source : '',
        onClose : function() {}
      });
    };
    $("#idcustomer").select2({
    	placeholder: "Customer Name",
      ajax: {
        url: '<?php echo base_url()?>Welcome/getCustomerSelect2',
        dataType: 'json'
      }
    });
    $("#idbuku").select2({
    	placeholder: "Book Name",
      ajax: {
        url: '<?php echo base_url()?>Welcome/getBukuSelect2',
        dataType: 'json'
      }
    });
    $("#category").select2({
      placeholder: "Category",
    });
    tableBuku();
    tableCustomer();
    tableRent();

    function tableBuku() {
      loading();
      $('#tableBuku').DataTable().destroy();
        return table = $('#tableBuku').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 1, 10, 25, 49 ],
            [ '1 row', '10 rows', '25 rows', '49 rows' ]
        ],
        buttons: [
	        {
	            text: 'add buku',
	            action: function ( e, dt, node, config ) {
	            	$("#form-buku").show('show');
	            }
	        },
          {
              text: 'filter price Rp. 2,000 to Rp. 6,000',
              action: function ( e, dt, node, config ) {
                $('#tableBuku').DataTable().ajax.url('<?php echo base_url()?>Welcome/getBukuFilterPrice').load();
              }
          },
          {
              text: 'filter no rent',
              action: function ( e, dt, node, config ) {
                $('#tableBuku').DataTable().ajax.url('<?php echo base_url()?>Welcome/getBukuFilterNotRent').load();
              }
          },
          {
              text: 'show all',
              action: function ( e, dt, node, config ) {
                $('#tableBuku').DataTable().ajax.url('<?php echo base_url()?>Welcome/getBuku').load();
              }
          },
            'pageLength',
        ],
        processing: true,
        serverSide: true,
        "pageLength": 10,
        searching: false,
        ajax: {
          url: '<?php echo base_url()?>Welcome/getBuku',
          type:'POST',
            "error": function (e) {
              console.log(e);
              $("#loading").waitMe("hide");
              if (e == 'error_auth') return e;
              return e;
            },
            "dataSrc": function (d) {
                console.log(d);
                nextableRent = d.next;
                $("#loading").waitMe("hide");
                return d.data
            }
        },
        columns: [
          { 
            "data": null,
            "sortable": false,
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: 'Title' },
          { data: 'Author' },
          { data: 'Price_rent', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' ) },
          { 
          	data: 'Book_Category'
          }
        ]
      });
    };

    $("#save-buku").on('click', function() {
    	if ($("#title").val() == null || $("#title").val() == '') {alert("title can't be null"); return false}
    	if ($("#pricerent").val() == null || $("#pricerent").val() == '') {alert("price rent can't be null"); return false}
    	if ($("#category").val() == null || $("#category").val() == '') {alert("category can't be null"); return false}
    	$.ajax({
    		type: 'post',
    		url: '<?php echo base_url()?>Welcome/insertBuku',
    		data: {title: $("#title").val(), author: $("#author").val(), price_rent: $("#pricerent").val(), book_category: $("#category").val()},
    		dataType: 'json',
    		success: function (success) {
    			if (success == 1) {
    				alert("berhasil menambahkan buku")
    			}else{
    				alert("gagal menambahkan buku")
    			}
    			tableBuku();
          $("#form-buku").hide('hide');
    		}
    	})
    })

    $("#cancel-form-buku").on('click', function() {
    	$("#form-buku").hide('hide');
    })

    function tableCustomer() {
      loading();
      $('#tableCustomer').DataTable().destroy();
        return table = $('#tableCustomer').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 1, 10, 25, 49 ],
            [ '1 row', '10 rows', '25 rows', '49 rows' ]
        ],
        buttons: [
	        {
	            text: 'add customer',
	            action: function ( e, dt, node, config ) {
	            	$("#form-customer").show('show');
	            }
	        },
            'pageLength',
        ],
        processing: true,
        serverSide: true,
        "pageLength": 10,
        searching: false,
        ajax: {
          url: '<?php echo base_url()?>Welcome/getCustomer',
          type:'POST',
            "error": function (e) {
              console.log(e);
              $("#loading").waitMe("hide");
              if (e == 'error_auth') return e;
              return e;
            },
            "dataSrc": function (d) {
                console.log(d);
                nextableRent = d.next;
                $("#loading").waitMe("hide");
                return d.data
            }
        },
        columns: [
          { 
            "data": null,
            "sortable": false,
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: 'Name' },
          { data: 'Identity_card_number' },
          { 
            data: 'Address'
          }
        ]
      });
    };

    $("#save-customer").on('click', function() {
    	if ($("#name").val() == null || $("#name").val() == '') {alert("name can't be null"); return false}
    	if ($("#identity").val() == null || $("#identity").val() == '') {alert("identity number can't be null"); return false}
    	$.ajax({
    		type: 'post',
    		url: '<?php echo base_url()?>Welcome/insertCustomer',
    		data: {name: $("#name").val(), identity: $("#identity").val(), address: $("#address").val()},
    		dataType: 'json',
    		success: function (success) {
    			if (success == 1) {
    				alert("berhasil menambahkan customer")
    			}else{
    				alert("gagal menambahkan customer")
    			}
    			tableCustomer();
    		}
    	})
    })

    $("#cancel-form-customer").on('click', function() {
    	$("#form-customer").hide('hide');
    })

    function tableRent() {
      loading();
      $('#tableRent').DataTable().destroy();
        return table = $('#tableRent').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 1, 10, 25, 49 ],
            [ '1 row', '10 rows', '25 rows', '49 rows' ]
        ],
        buttons: [
	        {
	            text: 'add rent',
	            action: function ( e, dt, node, config ) {
	            	$("#form-rent").show('show');
	            }
	        },
          {
              text: 'filter rent than more 10',
              action: function ( e, dt, node, config ) {
                $('#tableRent').DataTable().ajax.url('<?php echo base_url()?>Welcome/getRentFilter').load();
              }
          },
          {
              text: 'show all',
              action: function ( e, dt, node, config ) {
                $('#tableRent').DataTable().ajax.url('<?php echo base_url()?>Welcome/getRent').load();
              }
          },
            'pageLength',
        ],
        processing: true,
        serverSide: true,
        "pageLength": 10,
        searching: false,
        ajax: {
          url: '<?php echo base_url()?>Welcome/getRent',
          type:'POST',
            "error": function (e) {
              console.log(e);
              $("#loading").waitMe("hide");
              if (e == 'error_auth') return e;
              return e;
            },
            "dataSrc": function (d) {
                console.log(d);
                nextableRent = d.next;
                $("#loading").waitMe("hide");
                return d.data
            }
        },
        columns: [
          { 
            "data": null,
            "sortable": false,
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: 'rent_id' },
          { data: 'customer' },
          { data: 'title' },
          { data: 'count_book' },
          { data: 'count_rent' }
        ]
      });
    };

    $("#save-rent").on('click', function() {
      if ($("#idcustomer").val() == null || $("#idcustomer").val() == '') {alert("Customer can't be null"); return false}
      if ($("#idbuku").val() == null || $("#idbuku").val() == '') {alert("Book rent can't be null"); return false}
      if ($("#daterent").val() == null || $("#daterent").val() == '') {alert("Date Rent can't be null"); return false}
      if (new Date($("#daterent").val()).getTime() > new Date($("#datereturn").val()).getTime()) {alert("Date Return can't be smaller than Date Rent"); return false}
      $.ajax({
        type: 'post',
        url: '<?php echo base_url()?>Welcome/insertRent',
        data: {idcustomer: $("#idcustomer").val(), idbuku: $("#idbuku").val(),daterent: $("#daterent").val(), datereturn: $("#datereturn").val()},
        dataType: 'json',
        success: function (success) {
          if (success == 1) {
            alert("berhasil menambahkan rent")
          }else{
            alert("gagal menambahkan rent")
          }
          tableRent();
          $("#form-rent").hide('hide');
        }
      })
    })

    $("#cancel-form-rent").on('click', function() {
      $("#form-rent").hide('hide');
    })

    $.fn.dataTable.ext.errMode = 'none';
  </script>