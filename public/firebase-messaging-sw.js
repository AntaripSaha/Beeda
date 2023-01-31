/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
if( 'undefined' === typeof window){
    importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
    importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
 } 
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
        apiKey: "AIzaSyBI62C3Y_Rz1N78xK6XC3JboMrFCbsTRFk",
        authDomain: "wrabbit-cc77f.firebaseapp.com",
        databaseURL: "https://wrabbit-cc77f.firebaseio.com",
        projectId: "wrabbit-cc77f",
        storageBucket: "wrabbit-cc77f.appspot.com",
        messagingSenderId: "1078792944510",
        appId: "1:1078792944510:web:35f0a1168ed751b6e0112f",
        measurementId: "G-7RWPT0E2YE"
    });
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});