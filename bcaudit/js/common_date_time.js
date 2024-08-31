async function getCommonDateTime() {
    try {
      const response = await fetch('https://worldtimeapi.org/api/timezone/Asia/Kolkata');
      const data = await response.json();
  
      // Create a Date object using the UTC datetime
      const utcDateTime = new Date(data.utc_datetime);
      
      // Convert the UTC time to Asia/Kolkata time using time zone offset
      const kolkataTime = new Date(utcDateTime.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' }));
  
      // Define options for date and time formatting
      const options = { 
        year: 'numeric', 
        month: 'short', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit', 
        hour12: true,
        timeZone: 'Asia/Kolkata' 
      };
  
      // Format the date and time
      const formattedTimeGlobal = kolkataTime.toLocaleString('en-GB', options);
  
      // Extracting formatted components to construct the desired format
      const day = formattedTimeGlobal.slice(0, 2);
      const month = formattedTimeGlobal.slice(3, 6);
      const year = formattedTimeGlobal.slice(7, 11);
      const time = formattedTimeGlobal.slice(12);
  
      // Construct the final formatted date-time string
      const formattedTimeCustom = `${day}-${month}-${year}, ${time}`;
  
      // Update the HTML element with the exact time
      document.getElementById('dateTime').innerHTML = `${formattedTimeCustom}`;
      
      // Return the formatted time
      return formattedTimeCustom;
    } catch (error) {
      console.error('Error fetching exact time:', error);
    }
  }
  