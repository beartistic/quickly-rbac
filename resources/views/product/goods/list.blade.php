@include('zuimei.layout.header')
@include('zuimei.layout.toolbar')
@include('zuimei.layout.leftbar')
<style>
.panel-group .panel{
    overflow: visible;
}
</style>
<section id="content">
  <section class="vbox">
    <section class="scrollable wrapper">
      <?php if(!empty($breadcrumb)): ?>
	  <div class="row">
        <div class="col-lg-12">
          <!-- .breadcrumb -->
          <ul class="breadcrumb" id="breadcrumb">
           <?php foreach ($breadcrumb as $k=> $v): ?>
            <li>
              <a href="<?= $v['uri'] ?>">
                <i class="<?= $v['icon'] ?>"></i>
                <?= $k ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <!-- / .breadcrumb -->
        </div>
      </div>
      <?php endif; ?>
      <section class="panel panel-default" id="query_form_section">
      @include('product.goods.inputgroup')
      </section>
	  <section class="panel panel-default">
      <header class="panel-heading">总计:<span class="records_cnt"><?= $total ?></span></header>
        <div class="table-responsive" id="query_result">
        @include('product.goods.query')
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-4 hidden-xs">
              <select class="input-sm form-control input-s-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option></select>
              <button class="btn btn-sm btn-default">Apply</button>
             </div>
            <div class="col-sm-4 text-right text-center-xs" id="id_pagination"></div>
          </div>
      </footer>
      </section>
    </section>
  </section>
  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
  @include('zuimei.layout.modal')
</section>
<script>
////Query
var hanlder = function(that){
  var requestUrl = "<?= url("goods/postquery") ?>";
  var params = getParams();
  $.ajax({
    "url": requestUrl,
    "type": "post",
    "data" : params,
    "dataType" : "html",
    "error" : function (jqXHR, 
         textStatus, errorThrown) {
	 	 ajaxErrorHandle(jqXHR);
    },
    "success" : function (data) {
      $("#query_result").html(data);
      bindPagination();
      previewimg();
      updateCount(".records_cnt", getOptions().totalRows);
      toastr.clear();
    }
  });
}
bindEvent(".querySbtn", "click", hanlder);
////Add
var hanlder = function(that){
  var requestUrl = "<?= url("goods/postadd") ?>";
  var params = getParams();
  var attrs = {"name":"attrs","value":$(".wysiwyg_content").val()};
  params.push(attrs);
  var tableColumns = $("#tableColumns").val();
  $.ajax({
    "url": requestUrl,
    "type": "post",
    "data" : params,
    "dataType" : "html",
    "error" : function (jqXHR, 
         textStatus, errorThrown) {
	 	 ajaxErrorHandle(jqXHR);
    },
    "success" : function (data) {
	  window.location.reload();
    }
  });
}
bindEvent(".newSbtn", "click", hanlder);
////Edit
var hanlder = function(that){
  document.getElementById('breadcrumb').scrollIntoView();
  var requestUrl = "<?= url("goods/postrow") ?>";
  var tableColumns = $("#tableColumns").val();
  setInputEmpty(tableColumns);
  var id = that.parent().parent().find("td:eq(1)").text();
  $("#query_form").find("input[name='id']").val(id);
  var params = getParams();
  $.ajax({
    "url": requestUrl,
    "type": "post",
    "data" : params,
    "dataType" : "html",
    "error" : function (jqXHR, 
         textStatus, errorThrown) {
	 	 ajaxErrorHandle(jqXHR);
    },
    "success" : function (data) {
	  $("#query_form_section").html(data);
	  $("input[name='id']").attr("readonly","readonly");
      previewimg();
      $('#editor').wysiwyg();
    }
  });
}
bindEvent(".editRecord", "click", hanlder);

var hanlder = function(that){
  var requestUrl = "<?= url("goods/postupdate") ?>";
  var tableColumns = $("#tableColumns").val();
  var params = getParams();
  var attrs = {"name":"attrs","value":$(".wysiwyg_content").val()};
  params.push(attrs);
  $.ajax({
    "url": requestUrl,
    "type": "post",
    "data" : params,
    "dataType" : "html",
    "error" : function (jqXHR, 
         textStatus, errorThrown) {
	 	 ajaxErrorHandle(jqXHR);
    },
    "success" : function (data) {
      window.location.reload();
    }
  });
}
bindEvent(".updateSbtn", "click", hanlder);
////Remove Confirm
var hanlder = function(that) {
  var requestUrl = "<?= url("goods/postdelete") ?>";
  var tableColumns = $("#tableColumns").val();
  var params = getParams();
  $.ajax({
    "url": requestUrl,
    "type": "post",
    "data" : params,
    "dataType" : "html",
    "error" : function (jqXHR, 
         textStatus, errorThrown) {
	 	 ajaxErrorHandle(jqXHR);
    },
    "success" : function (data) {
      setInputEmpty(tableColumns);
	  $("#query_result").html(data);
	  previewimg();
	  bindPagination();
    }
  });
}
//Notice: if .confirmed has multi-hanlder. 
//you can unbind .confirmed click in targt element
bindEvent(".confirmed", "click", hanlder);
////Remove
var hanlder = function(that) {
	var id = that.parent().parent().find("td:eq(1)").text();
	$("#query_form").find("input[name='id']").val(id);
	//set modal
	$("#mymodel .model_body_txt").text("您确定要删除当前商品吗？");
}
bindEvent(".removeRecord", "click", hanlder);

//Preview images
var previewimg = function (){
	$('.previewimg img').popover({
        container: 'body',
  	  html: true,
  	  trigger: 'hover',
  	  content: function () {
  	    return '<img width=100% height=100% src="'+$(this).attr('src') + '" />';
  	  }
  });
}
$(function(){
	previewimg();
})
</script>
@include('product.layout.footer')
        