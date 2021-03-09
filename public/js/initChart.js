let ctx1 = document.getElementById('chart1');
let ctx2 = document.getElementById('chart2');

let data = {
    labels: ['1月', '2月', '3月', '4月', '5月', '6月'],
    datasets: [{
        label: '物品领用统计',
        barPercentage: 0.5,
        barThickness: 6,
        maxBarThickness: 8,
        minBarLength: 2,
        backgroundColor: '#0d6efd',
        data: [10, 20, 30, 40, 50, 60, 70]
    }]
};

let options = {
    responsive:true,
    maintainAspectRatio: false,
    legend: {
        display: false,
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};

let chart1 = new Chart(ctx1, {
    type: 'bar',
    //data: data,
    data: {
        labels: ['1月', '2月', '3月', '4月', '5月', '6月'],
        datasets: [{
            label: '领用统计',
            backgroundColor: '#0d6efd',
            barPercentage: 0.5,
            data: [638, 300, 488, 1050, 214, 843]
        }]
    },
    options: options
});

let chart2 = new Chart(ctx2, {
    type: 'horizontalBar',
    //data: data,
    data: {
        labels: ['1月', '2月', '3月', '4月', '5月', '6月'],
        datasets: [{
            label: '领用排行榜',
            backgroundColor: '#0dcaf0',
            data: [638, 300, 488, 1050, 214, 843]
        }]
    },
    options: options
});
