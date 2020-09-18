<html>

<head>
  <title>Dynamically Add or Remove input fields in PHP with JQuery</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <div class="container">
    <br />
    <br />
    <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>
    <div class="form-group">
      {{-- <form name="add_name" action="{{url('store-dynamic')}}" method="post" id="add_name">
      <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field">
          <td><input type="text" name="name[]" placeholder="Masukkan field" class="form-control name_list" /></td>
          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
        </table>
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
      </div>
      </form> --}}

      <form id="laravel_json" method="post" action="{{url('store-dynamic')}}">
        @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        </div>
        <div class="form-group">
          <label for="email">Email Id</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        </div>
        <div class="form-group">
          <label for="mobile_number">Mobile Number</label>
          <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>

        <table class="table table-bordered" id="dynamic_field">
          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
        </table>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>

      <table class="table table-bordered">
        <td><input type="text" name="custom_label" id="custom_label" placeholder="Masukkan field" class="form-control name_list" /></td>
      </table>
    </div>
  </div>

  <div class="container">
    <br />
    <br />
    <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>
    <div class="form-group">
      <form id="myForm" method="POST" action="./exam_coordinates">
        <label for="question"> Question </label> <br>
        <input class="champ" type="textarea" name="question" id="question" value=""><br><br>
        <label for="ans"> Answers </label> <br>
        <input type="checkbox" name="ans1" id="ans1" values="" />
        <input type="text" name="ans1" id="ans1" value=""><br>
        <input type="checkbox" name="ans2" id="ans2" />
        <input type="text" name="ans2" id="ans2" value=""><br>
        <div id="more_answers"></div>
        <br>
        <button id="add_button">Add proposition</button> <br><br><br>
        <input type="submit" value="submit">
      </form>
      <form method="GET" action="foo.php" onChange="getHouseModel">
        <select name="house_model" id="house_model">
          <option value="">------</option>
          <option value="Model 1">Model 1</option>
          <option value="Model 2">Model 2</option>
          <option value="Model 3">Model 3</option>
        </select>
        <input type="text" name="label" id="label" value=""><br>
        <input type="text" name="custom_label" id="custom_label" placeholder="Masukkan field" class="form-control name_list" />

      </form>
    </div>
  </div>
  <label id="lblName">Test</label>


</body>

</html>
<script>
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $('#custom_label').change(function() {
      i++;
      var model = $('#custom_label').val();

      // $('#dynamic_field').append('<tr id="row'+i+'"><td><label>'model'</label></td></tr>');
      $('#dynamic_field').append('<tr id="row' + i + '"><td><label>' + model + '</label><input type="text" name="' + model + '"  class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

      // alert(model);

    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    //     $('#submit').click(function(){
    //         //  $.ajax({
    //         //     type:"POST",
    //         //     url: host + "/store_dynamic",
    //         //     data:$('#add_name').serialize(),
    //         //     success:function()
    //         //       {

    //         //       }
    //         //  });
    //     // $.ajax({
    //     //   url: "{{ url('store-dynamic')}}",
    //     //   method: 'post',
    //     //   data: $('#add_name').serialize(),
    //     //   success: function(response){
    //     //     alert('sukses');
    //     //   }});

    //     $("#add_name").submit();


    //    });

    $('#add_name').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: '{{ route("store-dynamic") }}',
        method: 'post',
        data: $(this).serialize(),
        // dataType:'json',
        // beforeSend:function(){
        //     $('#save').attr('disabled','disabled');
        // },
        success: function(data) {
          // if(data.error)
          // {
          //     var error_html = '';
          //     for(var count = 0; count < data.error.length; count++)
          //     {
          //         error_html += '<p>'+data.error[count]+'</p>';
          //     }
          //     $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
          // }
          // else
          // {
          //     dynamic_field(1);
          //     $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
          // }
          // $('#save').attr('disabled', false);
        }
      })
    });

  });

  // var addButton = $('#add_button');
  // var wrapper = $('#more_answers');
  // $(addButton).click(function(e) {
  //     e.preventDefault();
  //     var lastID = $("#myForm input[type=text]:last").attr("id");
  //     var nextId = parseInt(lastID.replace( /^\D+/g, '')) + 1;
  //     $(wrapper).append(`<div><input type="checkbox" name="ans${nextId}" id="ans${nextId}" values="" />&nbsp;<input type="text" name="ans${nextId}" id="ans${nextId}" value=""/><a href="#" class="delete">Delete</a><div>`);
  // });

  // $(wrapper).on("click", ".delete", function(e) {
  //     e.preventDefault();
  //     $(this).parent('div').remove();
  // })

  // $(document).ready(function () {
  //         $('#lblName').text('Hello, I am Arun Banik');
  //     });

  // function getHouseModel(){

  // }
  $('#house_model').change(function() {
    var model = $('#house_model').val();
    alert(model);
  });
  $('#label').change(function() {
    var model = $('#label').val();
    alert(model);
  });
  //  $('#custom_label').change(function() {
  //    var model=$('#custom_label').val();

  //   alert(model);
  // $('#dynamic_field').append('<tr id="row'+i+'"><label>'model'</label><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

  //  });
</script>