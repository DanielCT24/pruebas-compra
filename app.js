




/* LOGIN GOOGLE */
function loginWithGoogle() {
    gapi.load('auth2', function() {
        const auth2 = gapi.auth2.init({
            client_id: '565811623395-437nfvp1c12oh3r6l6ht22bbufdmdb77.apps.googleusercontent.com',
        });
        auth2.signIn().then(function(googleUser) {
            const profile = googleUser.getBasicProfile();
            alert('Bienvenido ' + profile.getName());
        });
    });
}






