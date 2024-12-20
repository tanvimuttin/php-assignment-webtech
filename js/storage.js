export function saveRegistration(data) {
  const registrations = getRegistrations();
  registrations.push(data);
  const jsonData = JSON.stringify(registrations);
  
  // Set cookie that expires in 30 days
  const expiryDate = new Date();
  expiryDate.setDate(expiryDate.getDate() + 30);
  document.cookie = `registrations=${encodeURIComponent(jsonData)};expires=${expiryDate.toUTCString()};path=/`;
}

export function getRegistrations() {
  const cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('registrations='));
    
  if (cookieValue) {
    const jsonData = decodeURIComponent(cookieValue.split('=')[1]);
    try {
      return JSON.parse(jsonData);
    } catch (e) {
      console.error('Error parsing registration data:', e);
      return [];
    }
  }
  return [];
}

export function clearRegistrations() {
  // Set cookie to expire immediately
  document.cookie = 'registrations=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
}