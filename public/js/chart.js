$( document ).ready(function() {

    if ($('div.chart-container').length == 0 )
        return 0;

    var canvasSize = parseInt($('div.chart-container').css('width'));
    $('canvas').attr('width', canvasSize);
    $('canvas').attr('height', canvasSize);

    var colors = ["#77a9ca", "#95a5a6", "#46515d", "#25a35a", "#c06b62"];
    var data = JSON.parse($('div#charData').text());
    var colorIndex = 0;
    for(var i=0; i < data.length; i++){
        if (colors[colorIndex] === undefined)
            colorIndex = 0;
        data[i].color = colors[colorIndex];
        colorIndex++;
    }
    canvasChart.init(data);
    canvasChart.draw();

    $(window).resize( respondCanvas );
    function respondCanvas(){
        var newWidth = parseInt($('div.chart-container').css('width'));
        var canvasWidth = $('canvas').attr('width');
        if (newWidth != canvasWidth){
            $('canvas').attr('width', newWidth);
            $('canvas').attr('height', newWidth);
            canvasChart.init(data);
            canvasChart.draw();
        }
    }
});

var canvasChart = new function(){

    this.init =  function(data){
        this.canvas = document.getElementsByTagName("canvas")[0];
        this.ctx = this.canvas.getContext("2d");
        this.wh = this.canvas.height = this.canvas.width = $('canvas').attr('width');
        this.arcs = [];
        this.lineWidth = this.wh * 0.0529;
        this.marginRadius = this.lineWidth * 1.15;
        this.radius = this.wh / 2 - this.lineWidth / 2;
        for (var i = 0; i < data.length; i++) {
            var s = this.arc(data[i]);
            s.r = this.radius;
            this.arcs.push(s);
            this.radius -= this.marginRadius;
        }
    };

    this.arc = function(data){
        var item = new Object();
        var local = this;
        item.rot = 0;
        item.name = data.name;
        item.rank = data.rank;

        item.draw = function(){
            local.ctx.save();
            local.ctx.beginPath();
            local.ctx.lineTo(0,local.wh/2 - item.r);
            local.ctx.stroke();
            local.ctx.translate(local.wh/2, local.wh/2);
            local.ctx.rotate(local.inRad(-90));
            local.ctx.arc(0, 0, item.r, 0, item.rot, false);
            local.ctx.lineWidth = local.lineWidth;
            local.ctx.strokeStyle = data.color;
            local.ctx.stroke();
            local.ctx.restore();
        };
        return item;
    };

    this.draw =  function (){
        this.drawStick();
        this.drawCircle();
        for(var i=0;i<this.arcs.length;i++){
            var a = this.arcs[i];
            var val = 8;
            a.rot = Math.PI*2*this.arcs[i].rank*0.75*0.1;
            a.draw();
        }

        this.ctx.fillStyle = "#353535";
        this.ctx.font = 0.8*this.lineWidth+"px/"+0.8*this.lineWidth+"px ProximaNovaLight";

        for(var i=0;i<this.arcs.length;i++){
            textPosition = this.wh/2  - this.arcs[i].r+this.lineWidth/3;
            this.ctx.fillText(this.arcs[i].name, 0, textPosition);
        }
    };

    this.drawStick = function(){
        this.ctx.save();
        this.ctx.beginPath();
        this.ctx.moveTo(this.wh/2,this.wh/2);
        this.ctx.lineTo(this.wh/2,this.wh);
        this.ctx.moveTo(this.wh/2,this.wh/2);
        this.ctx.strokeStyle = "#46515d";
        this.ctx.lineWidth = 5;
        this.ctx.stroke();
        this.ctx.restore();
    };

    this.drawCircle = function(){
        this.ctx.save();
        this.ctx.fillStyle="#c06b62";
        this.ctx.arc(this.wh/2,this.wh/2,this.radius,0,2*Math.PI,true);
        this.ctx.fill();
        this.ctx.restore();
    }

    this.inRad = function(num){
        return num * Math.PI / 180;
    };
};

