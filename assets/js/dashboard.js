// Line Chart (Teachers & Students)
const ctx1 = document.getElementById('lineChart').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
            {
                label: 'Teachers',
                data: [30, 50, 70, 60, 40, 50, 30],
                borderColor: 'blue',
                fill: false
            },
            {
                label: 'Students',
                data: [20, 40, 60, 80, 60, 70, 40],
                borderColor: 'green',
                fill: false
            }
        ]
    }
});

// Bar Chart (Number of Students)
const ctx2 = document.getElementById('barChart').getContext('2d');
new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
            {
                label: 'Boys',
                data: [200, 400, 300, 500, 450, 600, 480],
                backgroundColor: 'blue'
            },
            {
                label: 'Girls',
                data: [250, 350, 400, 450, 500, 550, 530],
                backgroundColor: 'green'
            }
        ]
    }
});
