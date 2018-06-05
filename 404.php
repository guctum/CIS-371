<html>
<head>
    <title>Error 404: Personality Not Found</title>
    <script src="https://cis371a.hopto.org:9040/demo/Chart.bundle.js"></script>
    <script src="https://cis371a.hopto.org:9040/demo/utils.js"></script>
</head>
<body>

<h1>Error 404!</h1>
    <h2>Personality module not found. Go check elsewhere.</h2>
<br />
<iframe src="https://giphy.com/embed/vY8IPlHF51Kww" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/reaction-news-steve-carell-vY8IPlHF51Kww"></a></p>
<br /><br />

Total 404 Requests: 362<br />

    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area" />
    </div>
 
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
        362,872,                ],
                backgroundColor: [
                    window.chartColors.blue,
                    window.chartColors.purple,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "404Error",
                "Other Errors"
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


<hr />

</body>
    
</html>