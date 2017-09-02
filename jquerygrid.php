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
    <h1>Jquery Grid System</h1>
    <div id="jsGrid"></div>

    <script>
        $(function() {

            $("#jsGrid").jsGrid({
                height: "70%",
                width: "100%",
                filtering: true,
                editing: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                deleteConfirm: "Do you really want to delete the client?",
                controller: db,
                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                    { type: "control" }
                ]
            });

        });
    </script>
</body>
</html>
