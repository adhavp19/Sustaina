
 /* 
let ctx = document.getElementById('myChart').getContext('2d');
let labels = ["Appointment Co-Pay", "Antibody Screen", "Airway Inhiliation Treatment", "Comprehensive Metabolic Panel", "XR Chest 2 Views"];
let colorHex = ['#1E90FF', '#89CFF0', '#4682B4', '#6495ED', '#B0E0E6', '#87CEEB', '#00CCCC', '#0F52BA', '#4B0082', '#1C39BB', '#008080', '#81D8D0', '#73C2FB', '#003153']
Chart.defaults.color = '#000';

/*
let myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [50, 120, 345, 171, 227],
      backgroundColor: colorHex
     
    }],
    labels: labels
  },
  options: {
    responsive: true,
    offset:10,
    borderRadius:15,
   
    plugins: {
      legend: {
        display:'true',
        position: 'bottom',
        

        labels: {
          
          // This more specific font property overrides the global property
          font: {
              size: 14,
              family:"'Source Sans Pro', sans-serif",
              
          }
      }
        
        
      },
      title: {
        display: true,
        text: 'Estimated Cost Breakdown',
        font: {
          size: 25,
          family:"'Source Sans Pro', sans-serif",
          
      },
    },
    
      subtitle:{
        display:true,
        text:'(Hover over each slice)',
        font:{
          size:14,
          family:"'Source Sans Pro', sans-serif",
          
        },
        
      },
        
      
      tooltip: {
        yAlign:'bottom',
        backgroundColor:colorHex,
        displayColors:false,
        titleFont:{
          family: "Source Sans Pro, sans-serif",
          size:20,
  
        },
        bodyFont:{
          family: "Source Sans Pro, sans-serif",
          size:20,
          
  
        },
        bodyAlign:'center',
      },
    
       
      
    },
   
  },

  
})
*/

var options = {
  series: [50, 120, 345, 171, 227],
  chart: {
    type: 'donut',
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();