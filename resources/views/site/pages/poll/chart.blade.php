<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "{{$poll->title}}"
            },
            data: [{
                type: "pie",
                startAngle: 25,
                toolTipContent: "<b>{label}</b>: {y}%",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y}%",
                dataPoints: [
                        @foreach($poll->options as $option)
                    { y: '{{$poll->userPolls()->count() ? ($option->userPolls()->count() / $poll->userPolls()->count()) * 100 : 0}}', label: "{{$option->option}}" },
                    @endforeach
                ]
            }]
        });
        chart.render();

    }
</script>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Vote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{$poll->question}}</h1>
                @foreach($poll->options as $option)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-6">{{$option->option}}</div>
                            <div class="col-lg-6 text-right">
                                {{$poll->userPolls()->count() ? '('.$option->userPolls()->count() .' users ) '.($option->userPolls()->count() / $poll->userPolls()->count()) * 100 : 0}}%
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="chartContainer" style="height: 500px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
