<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>jsGrid - Basic Scenario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jsgrid1/demos/demos.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="jsgrid1/css/jsgrid.css" />
    <link rel="stylesheet" type="text/css" href="jsgrid1/css/theme.css" />

    <script src="jsgrid1/external/jquery/jquery-1.8.3.js"></script>
    <script src="jsgrid1/demos/db.js"></script>

    <script src="jsgrid1/src/jsgrid.core.js"></script>
    <script src="jsgrid1/src/jsgrid.load-indicator.js"></script>
    <script src="jsgrid1/src/jsgrid.load-strategies.js"></script>
    <script src="jsgrid1/src/jsgrid.sort-strategies.js"></script>
    <script src="jsgrid1/src/jsgrid.field.js"></script>
    <script src="jsgrid1/src/fields/jsgrid.field.text.js"></script>
    <script src="jsgrid1/src/fields/jsgrid.field.number.js"></script>
    <script src="jsgrid1/src/fields/jsgrid.field.select.js"></script>
    <script src="jsgrid1/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="jsgrid1/src/fields/jsgrid.field.control.js"></script>
</head>
<body>
    <h1>Basic Scenario</h1>
    <div id="jsGrid"></div>

    <script>
    var clients=[];
    // var clients = [
    //      { "product_name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false },
    //     ];
    $(document).ready(function(){
        $.post("get_data.php", function(res){
            clients=res;
            console.log(clients);


            $("#jsGrid").jsGrid({
                width: "100%",
                height: "400px",
            
                inserting: true,
                editing: true,
                sorting: true,
                paging: true,
            
                data: clients,
            
                fields: [
                    { name: "product_name", type: "text", width: 150, validate: "required" },
                    
                    { type: "control" }
                ]
            });


            
        }, "json");
    })
 
    
    
</script>
        
        
</body>
</html>
