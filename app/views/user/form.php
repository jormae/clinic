<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center">Account Detail</h3>
    <!-- <input type="hidden" id="visitno" value="<?=$data['personInfo']['visitno']?>"> -->
  </div>
</div>
<div class="w3-container" style="padding:50px 16px">
  <div class="w3-row">
    <div class="w3-row w3-section ">
       <div id="message-box"></div>
      <!-- <div class="w3-row-padding"> -->
      <div class="w3-col m12">
        <div class="w3-col l1 m6 s12"> เลขที่บัตร :</div>
        <div class="w3-col l3 m6 s12">
          <input type="number" value="" name="idcard" id="idcard" width="100%">
        </div>
        <div class="w3-col l1 m6 s12"> ชื่อ-สกุล :</div>
        <div class="w3-col l3 m6 s12">
          <input type="text" value="" name="fullname" id="fullname">
        </div>
        <button class="w3-button w3-black w3-hover-red" id="btn-save">Save</button>

        <!-- </div> -->
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("#btn-save").click(function(){
    let idcard = $("#idcard").val()
    let fullname = $("#fullname").val()

    $.ajax({
      type:'POST',
      url: 'http://localhost:3305/users/',
      data:{
        idcard:idcard,
        fullname:fullname
      }
    })
    .done(function(response){
          console.log("Response : ",response)
          $("#message-box").html('<div class="w3-panel w3-pale-green">\
            <h5>'+response.message+'</h5>\
          </div>')
    })
    .fail(function(xhr, textStatus, errorThrown){
          console.log(xhr.responseText['errors']['value'])
          $("#message-box").html('<div class="w3-panel w3-pale-red">\
            <h5>'+xhr.responseText+'</h5>\
          </div>')
          // return xhr.responseText;
    });
    // .fail(function(response){
    //       console.log("ERROR : ",response.responseJSON.message)
    //       $("#message-box").html('<div class="w3-panel w3-pale-red">\
    //         <h5>'+response.responseJSON.message+'</h5>\
    //       </div>')
    // });
  })
  </script>
