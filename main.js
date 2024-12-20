import { saveRegistration, getRegistrations, clearRegistrations } from './js/storage.js'
import { createRegistrationList } from './js/registrationList.js'

function updateRegistrationsList() {
  const registrationsList = document.getElementById('registrationsList')
  registrationsList.innerHTML = createRegistrationList(getRegistrations())
}

document.getElementById('registrationForm').addEventListener('submit', (e) => {
  e.preventDefault()
  const formData = new FormData(e.target)
  const data = Object.fromEntries(formData)
  saveRegistration(data)
  updateRegistrationsList()
  e.target.reset()
})

document.getElementById('clearRegistrations').addEventListener('click', () => {
  clearRegistrations()
  updateRegistrationsList()
})

// Initialize the registrations list
updateRegistrationsList()