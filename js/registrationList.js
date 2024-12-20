export function createRegistrationList(registrations) {
    if (registrations.length === 0) {
      return '<p class="no-registrations">No registrations yet</p>';
    }
  
    return `
      <div class="registrations-list">
        ${registrations.map((registration, index) => `
          <div class="registration-card">
            <div class="registration-header">
              <h3>Registration #${index + 1}</h3>
            </div>
            <div class="registration-details">
              <p><strong>Name:</strong> ${registration.firstName} ${registration.lastName}</p>
              <p><strong>Email:</strong> ${registration.email}</p>
              <p><strong>Country:</strong> ${registration.country}</p>
              <p><strong>Gender:</strong> ${registration.gender}</p>
            </div>
          </div>
        `).join('')}
      </div>
    `;
  }