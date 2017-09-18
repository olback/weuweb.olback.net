/*
 *  JavaScript for the prfile page on weuweb.olback.net
 */

const profileInfoButton = document.getElementById('updateProfile');
const updatePasswordButton = document.getElementById('updatePassword');

function enableInput(id) {
    var input = document.getElementById(id);
    input.readOnly = false;
    profileInfoButton.disabled = false;
}