const cacheName = "v1";

const cacheAssets = [
  "../assets/dist/css/alt/AdminLTE-bootstrap-social.css",
  "../assets/dist/css/alt/AdminLTE-bootstrap-social.min.css",
  "../assets/dist/css/alt/AdminLTE-fullcalendar.css",
  "../assets/dist/css/alt/AdminLTE-fullcalendar.min.css",
  "../assets/dist/js/pages/dashboard.js",
  "../assets/dist/js/pages/dashboard2.js",
  "../assets/dist/js/adminlte.js",
  "../assets/dist/js/adminlte.min.js",
  "../assets/dist/js/demo.js"
];

// Call Install Event
self.addEventListener("install", e => {
  console.log("Service Worker: Installed");

  e.waitUntil(
    caches
      .open(cacheName)
      .then(cache => {
        console.log("Service Worker: Caching Files");
        cache.addAll(cacheAssets);
      })
      .then(() => self.skipWaiting())
  );
});

// Call Activate Event
self.addEventListener("activate", e => {
  console.log("Service Worker: Activated");
  // Remove unwanted caches
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            console.log("Service Worker: Clearing Old Cache");
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Call Fetch Event
self.addEventListener("fetch", e => {
  console.log("Service Worker: Fetching");
  e.respondWith(fetch(e.request).catch(() => caches.match(e.request)));
});
