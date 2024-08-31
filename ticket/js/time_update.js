function updateExactTime() {
    fetch('http://worldtimeapi.org/api/timezone/Asia/Kolkata')
      .then(response => response.json())
      .then(data => {
        const kolkataTime = new Date(data.utc_datetime);
        
        // Define options for date and time formatting
        const options = { 
          weekday: 'long', 
          year: 'numeric', 
          month: 'long', 
          day: 'numeric', 
          hour: 'numeric', 
          minute: 'numeric', 
          second: 'numeric', 
          timeZone: 'Asia/Kolkata' 
        };
  
        // Format the date and time
        const formattedTime = kolkataTime.toLocaleString('en-US', options);
  
        // Update the HTML element with the exact time
        document.getElementById('time').innerHTML = `${formattedTime}`;
      })
      .catch(error => console.error('Error fetching exact time:', error));
  }
  
//   Update the exact time every second (1000 milliseconds)
  setInterval(updateExactTime, 1000);
