<?PHP
session_start();

require("auth.php");

require("menu.php");

echo "<html>";
if (empty($_SESSION['auth']))
{ die("You are not logged in."); }

if ($_SESSION['auth'] == "admin")
{
echo "Welcome ".$_SESSION['auth'];

echo "<br /><br />";
system("uptime");
echo "<br /><br />";

echo "<pre>";
system("tail /home/student2/apache/logs/access_log");
echo "</pre>";
}

?>

<html>
<head>
    <title>Pie Chart</title>
    <script src="https://cis371a.hopto.org:9040/demo/Chart.bundle.js"></script>
        <script src="https://cis371a.hopto.org:9040/demo/utils.js"></script>
</head>
<body>


<?PHP

if (!empty($_POST['n1']))
{

?>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area" />
    </div>
    <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
        <?PHP
        echo $_POST['n1'].",".$_POST['n2'].",";
        echo $_POST['n3'].",".$_POST['n4'].",".$_POST['n5'];


?>
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                    window.chartColors.orange,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Yellow",
                "Green",
                "Blue",
                "Purple"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());

            var colorName = colorNames[index % colorNames.length];;
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
    </script>

<?PHP

}
?>

<hr />

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="AWJMC7XXV8KDU">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<hr />
<form action="account.php" method=post >
<input type=text name=n1 >
<input type=text name=n2 >
<input type=text name=n3 >
<input type=text name=n4 >
<input type=text name=n5 >
<input type=submit value="Create Pie Chart" >


</form>



</body>

</html>
