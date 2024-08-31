let formattedTimeGlobal = '';

async function updateExactTime() {
  try {
    const response = await fetch('https://worldtimeapi.org/api/timezone/Asia/Kolkata');
    const data = await response.json();

    // Create a Date object using the UTC datetime
    const utcDateTime = new Date(data.utc_datetime);
    
    // Convert the UTC time to Asia/Kolkata time using time zone offset
    const kolkataTime = new Date(utcDateTime.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' }));

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
    const formattedTimeGlobal = kolkataTime.toLocaleString('en-US', options);

    // Update the HTML element with the exact time
    document.getElementById('dateTime').innerHTML = `${formattedTimeGlobal}`;
    
    // Return the formatted time
    return formattedTimeGlobal;
  } catch (error) {
    console.error('Error fetching exact time:', error);
  }
}

updateExactTime();
// Update the exact time every second (1000 milliseconds)
setInterval(updateExactTime, 1000);
