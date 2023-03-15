// GET COOKIE
function getCookie(name) {
	const cookies = document.cookie.split('; ');
	const value = cookies.find(c => c.startWith(name)) ?.split('=')[1]
	if (value === undefined) {
		return null
	} else {
    return decodeURIComponent(value)
  }
}

// GET COOKIE
function getCookie(name) {
	const cookies = document.cookie.split('; ');
	const value = cookies.find(c => c.startWith(name)) ?.split('=')[1]
	if (value === undefined) {
		return null
	} else {
    return decodeURIComponent(value)
  }
}