<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Đề tài số 3 - Nhóm 6 
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<div class="form-horizontal">
					<div class="row-fluid">
						<!--/span-->
						<div class="span4 ">
							<div class="control-group">
								<label class="control-label">Kích thước ma trận</label>
								<div class="controls">
									<input name="sizematran" type="text" class="m-wrap span12" placeholder="Nhập n">
								</div>
							</div>
						</div>
						<div class="span6 ">
							<div class="control-group">
								<button id="creatematran" type="button" class="btn blue">Tạo ma trận
								</button>
							</div>
						</div>
					</div>
					<div id="addmatran" class="row-fluid">
					</div>
					<div id="addphanphoi" class="row-fluid">	
					</div>
					<div id="addluythua" class="row-fluid">	
					</div>
					<div id="addtrangthai" class="row-fluid">	
					</div>
                    <div id="addchuky" class="row-fluid">
                    </div>
                 <!--    <div id="addmatranluythua" class="row-fluid">
                    </div> -->
                  <!--   <div id="addkqchuky" class="row-fluid">
                    </div> -->
                      <div id="addkq" class="row-fluid">
                    </div>
					<div class="form-actions">
                        
                    </div>
					</div>
				</div>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
<script type="text/javascript">
    function creatematran(sizematran)
    {
    	$("#addphanphoi").html('');
        $("#addtrangthai").html('');
        $("#addluythua").html('');
        $("#addchuky").html('');
        $("#addkq").html('');
        if(sizematran <= 0) {
            $("#addphanphoi").html('');
            $("#addmatran").html('<span id="errorluythua" class="help-block">Vui lòng nhập kích thước ma trận là số nguyên lớn hơn 0</span>');
            return false;
        }
    	if(!sizematran || sizematran.length == 0) {
    		$("#addphanphoi").html('');
    		$("#addmatran").html('<span id="errorluythua" class="help-block">Vui lòng nhập kích thước ma trận</span>');
    		return false;
    	}
    	var html = '<div class="span6 ">';
    		html += '<form id="matrancheck" action="#" class="form-horizontal">';
    		html += '<table class="hephuongtrinh">';
            html += '<tbody><tr>';
            html += '<th colspan="'+sizematran+'" class="text-center">Ma trận ban đầu</th>';
            html += '</tr>';
            for (var i = 1; i <= sizematran; i++) {
            	html += '<tr>';
            	for (var j = 1; j <= sizematran; j++) {
            		html += '<td>';
            		var id = i+''+j;
                    html += '<input id="p'+i+j+'" value="" class="matran" onchange="bieuthuc('+id+')" placeholder="p['+i+']['+j+']" name="p'+i+j+'" type="text">'; 
                    html += '</td>'; 
            	}
                html += '</tr>';
            }
            html += '</tbody></table>';
            html += '<span id="errormatran" class="help-block"></span>';
            html += '<span id="successmatran" class="success"></span>';
            html += '<button id="checkmatran" type="button" class="btn blue"><i class="icon-ok"></i> Kiểm tra</button>';
            html += '</form>';
            html += '</div>';
        $("#addphanphoi").html('');    
		$("#addmatran").html(html);
		return false;
    }

    function createluythua() {
		html = '<div class="span4 ">';
		html += '<div class="control-group">';
		html += '<table class="">';
            html += '<tbody><tr>';
            html += '<th colspan="3" class="text-center">Tính ma trận chuyển sau n bước</th>';
            html += '</tr>';
            html += '<tr>';
    		html += '<td>';
    		var id = 3;
            html += '<input id="t3" value="" class="matran" onchange="bieuthuc2('+id+')" placeholder="Nhập n" name="t3" type="text">'; 
            html += '</td>'; 
            html += '<td>';
            html += '<button id="tinhluythua" type="button" class="btn blue">Tính ma trận</button>'; 
            html += '</td>';
            html += '</tr>';
            html += '</tbody></table>';
            html += '<span id="errorluythua" class="help-block"></span>';
            html += '<span id="successluythua" class="success"></span>';
		html += '</div>';
		html += '</div>';
		$("#addluythua").html(html);
		return false;
    }
    function createtrangthai() {
		html = '<div class="span4 ">';
		html += '<div class="control-group">';
		html += '<table class="">';
            html += '<tbody><tr>';
            html += '<th colspan="3" class="text-center">Kiểm tra tính liên thông</th>';
            html += '</tr>';
            html += '<tr>';
    		html += '<td>';
    		var id = 1;
            html += '<input id="t1" value="" class="matran" onchange="bieuthuc2('+id+')" placeholder="Nhập i" name="t1" type="text">'; 
            html += '</td>'; 
            html += '<td>';
            var id = 2;
            html += '<input id="t2" value="" class="matran" onchange="bieuthuc2('+id+')" placeholder="Nhập j" name="t2" type="text">'; 
            html += '</td>';
            html += '<td>';
            html += '<button id="checklienthong" type="button" class="btn blue"><i class="icon-ok"></i> Kiểm tra</button>'; 
            html += '</td>';
            html += '</tr>';
            html += '</tbody></table>';
            html += '<span id="errortrangthai" class="help-block"></span>';
            html += '<span id="successtrangthai" class="success"></span>';
		html += '</div>';
		html += '</div>';
		$("#addtrangthai").html(html);
		return false;
    }
    function createchuky() {
        html = '<div class="span4 ">';
        html += '<div class="control-group">';
            html += '<button id="tinhchuky" type="button" class="btn blue">Tính chu kỳ trạng thái</button>';
            html += '<span id="errorluythua" class="help-block"></span>';
            html += '<span id="successluythua" class="success"></span>';
            html += '<button id="tinhxs" type="button" class="btn blue">Tính xác suất </button>';
            html += '<span id="errorxs" class="help-block"></span>';
            html += '<span id="successxs" class="success"></span>';
        html += '</div>';
        html += '</div>';
        $("#addchuky").html(html);
        return false;
    }
    function bieuthuc(id) {
    	var str = $('input[name="p'+id+'"]').val();
    	var len=str.length;
	    for(i=0;i<len;i++){
            if(str.charAt(len-1) =='/') {
                $('input[name="p'+id+'"]').val(0);
                break;
            }
            if(str.charAt(0) =='/') {
                $('input[name="p'+id+'"]').val(0);
                break;
            }
	        if(kytuhoplebieuthuc(str.charAt(i))==false){
	            $('input[name="p'+id+'"]').val(0);
	            break;
	        }
	    } 
	}
	function bieuthuc2(id) {
    	var str = $('input[name="t'+id+'"]').val();
    	var len=str.length;
	    for(i=0;i<len;i++){
	        if(kytuhoplebieuthuc2(str.charAt(i))==false){
	            $('input[name="t'+id+'"]').val(0);
	            break;
	        }
	    } 
	}
	function createppbd(size) {
		if(!size || size.length == 0) {
    		$("#addphanphoi").html('');
    		return false;
    	}
    	if(size <= 0 || size > 10) {
    		$("#addphanphoi").html('');
    		return false;
    	}
    	var html = '<div class="span6 ">';
    		html += '<form id="phanphoicheck" action="#" class="form-horizontal">';
    		html += '<table class="hephuongtrinh">';
            html += '<tbody><tr>';
            html += '<th colspan="'+size+'" class="text-center">Phân phối ban đầu</th>';
            html += '</tr>';
            html += '<tr>';
            	for (var i = 1; i <= size; i++) {
            		html += '<td>';
                    html += '<input id="p'+i+'" value="" class="matran" onchange="bieuthuc('+i+')" placeholder="p['+i+']" name="p'+i+'" type="text">'; 
                    html += '</td>'; 
            	}
                html += '<td><button id="checkphanphoi" type="button" class="btn blue"><i class="icon-ok"></i> Kiểm tra</button></td>';
            html += '</tr>';
            html += '</tbody></table>';
            html += '<span id="errorphanphoi" class="help-block"></span>';
            html += '<span id="successphanphoi" class="success"></span>';
            html += '</form>';
            html += '</div>';
		$("#addphanphoi").html(html);
		return false;
	}
	function kytuhoplebieuthuc2(kytu){
	    switch(kytu){
	        case '0':
	        case '1':
	        case '2':
	        case '3':
	        case '4':
	        case '5':
	        case '6':
	        case '7':
	        case '8':
	        case '9':
	            return true;
	        default :
	                return false;
	    }
	}
	function kytuhoplebieuthuc(kytu){
	    switch(kytu){
	        case '0':
	        case '1':
	        case '2':
	        case '3':
	        case '4':
	        case '5':
	        case '6':
	        case '7':
	        case '8':
	        case '9':
	        case '/':
	        case '.':
	            return true;
	        default :
	                return false;
	    }
	}
</script>

<script>
jQuery(document).on('click', "#checkmatran", function() {
            	var datastring = $("#matrancheck").serializeArray();
            	var size = Math.sqrt(datastring.length);
                $.ajax({
                    type: "POST",
                    data: {
                    	datastring: datastring,
                    },
                    dataType: 'json',
                    url: 'matran',
                    success: function(data) {
                    	$("#addluythua").html('');
                        $("#addchuky").html('');
                        $("#addkq").html('');
                    	if(data.stt == 2) {
                    		$("#addphanphoi").html('');
                			$("#addtrangthai").html('');
                            $("#addmatranluythua").html('');
                            $("#addluythua").html('');
                            $("#addkq").html('');
                            $("#addchuky").html('');
                    		$("span#successmatran").html('');
                    		$("span#errormatran").html(data.msg);
                    	}
                    	else if(data.stt == 1) {
                    		$("span#errormatran").html('');
                    		$("span#successmatran").html(data.msg);
                    		createppbd(size);
                    	}
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#checklienthong", function() {
				var datastring = $("#matrancheck").serializeArray();
            	var t1 = $("input[name='t1']").val();
            	var t2 = $("input[name='t2']").val();
                $.ajax({
                    type: "POST",
                    data: {
                    	t1: t1,
                    	t2: t2,
                    	matran: datastring,
                    },
                    dataType: 'json',
                    url: 'checklienthong',
                    success: function(data) {
                    	if(data.stt == 3) {
                    		$("span#successmatran").html('');
                    		$("span#errormatran").html(data.msg);
                    		$("#addtrangthai").html('');
                            $("#addkq").html('');
                			$("#addluythua").html('');
                			$("#addphanphoi").html('');
                    	}
                    	if(data.stt == 2) {
                    		$("span#successtrangthai").html('');
                    		$("span#errortrangthai").html(data.msg);
                    	}
                    	else if(data.stt == 1) {
                    		$("span#errortrangthai").html('');
                    		$("span#successtrangthai").html(data.msg);
                            createchuky();

                    	}
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#checkphanphoi", function() {
            	var datastring = $("#phanphoicheck").serializeArray();
            	var size = datastring.length;
                $.ajax({
                    type: "POST",
                    data: {
                    	datastring: datastring,
                    },
                    dataType: 'json',
                    url: 'checkphanphoi',
                    success: function(data) {
                		$("#addtrangthai").html('');
                		$("#addluythua").html('');
                        $("#addkq").html('');
                    	if(data.stt == 2) {
                    		$("span#successphanphoi").html('');
                    		$("span#errorphanphoi").html(data.msg);
                    	}
                    	else if(data.stt == 1) {
                    		$("span#errorphanphoi").html('');
                    		$("span#successphanphoi").html(data.msg);
                    		createluythua();
                    		createtrangthai();
                    	}
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#tinhluythua", function() {
                var datastring = $("#matrancheck").serializeArray();
                var t3 = $("input[name='t3']").val();
                var size = Math.sqrt(datastring.length);
                $.ajax({
                    type: "POST",
                    data: {
                        datastring: datastring,
                        luythua: t3,
                    },
                    url: 'tinhluythua',
                    success: function(data) {
                        $("#addkq").html(data);
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#tinhchuky", function() {
                var datastring = $("#matrancheck").serializeArray();
                var size = Math.sqrt(datastring.length);
                $.ajax({
                    type: "POST",
                    data: {
                        datastring: datastring,
                        size: size,
                    },
                    url: 'tinhchuky',
                    success: function(data) {
                        $("#addkq").html(data);
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#tinhxs", function() {
                var datamatran = $("#matrancheck").serializeArray();
                var dataphanphoi = $("#phanphoicheck").serializeArray();
                $.ajax({
                    type: "POST",
                    data: {
                        datamatran: datamatran,
                        dataphanphoi: dataphanphoi
                    },
                    url: 'tinhxs',
                    success: function(data) {
                        $("#addkq").html(data);
                    }
                });

    });
</script>
<script>
jQuery(document).on('click', "#creatematran", function() {
            	var sizematran = $("input[name='sizematran']").val();
            	creatematran(sizematran);
    });
</script>

<style type="text/css">
.css {
	overflow: hidden;
}
div#addmatran, div#addphanphoi, div#addtrangthai,div#addluythua, div#addchuky, div#addkq{
	padding-left: 33px;
}
tbody th.text-center {
	text-align: left;
	font-family: 
}
body tr td input{
	width: 50px;
}
button#checkmatran {
	margin: 20px 0px;
}
.help-block {
    color: #b94a48;
}
.success {
	display: block;
	color: blue;
}
div#addluythua input {
	width: 135px;
}
div#addmatranluythua div.span1 table tr {
    height: 35px;
}
div#addkq div.span1 table.table tr, div#addkq div.span1 table.table-bordered{
    border: none !important;
}
div#addkq div.span1 table.table td {
    border: none !important;
    text-align: center;
    margin-bottom: -5px;
}
div#somu {
    margin-left: -30px;
    margin-top: -20px;    
}
div#addkq {
    padding-bottom: 20px;
}
div#addmatran div.span6{
    margin-top: -20px;
}
form#matrancheck tbody th.text-center {
    text-align: left;
    font-size: 15px;
    height: 33px;
}
tbody th.text-center {
    font-size: 15px;
}
div#addluythua {
    margin-top: 5px;
}
</style>


