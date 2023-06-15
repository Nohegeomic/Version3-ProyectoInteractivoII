;

const CACHE_NAME = 'v1_cache_proyecto_interactivo_ll',
urlsToCache = [
    './',
    './seviceWorker.js',
    './images/unitec_mini.png'
 ]

self.addEventListener('install', e=> {
    e.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache)
                .then(() =>self.skipwaiting())
            })
            .catch(err=> console.log('Fallo registro de cache', err))
    )
})

self.addEventListener('active', e=> {
    const cacheWhitelist = [CACHE_NAME] 

    e.waitUntil(
        caches.key()
            .then(cachesNames => {
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName)
                    }
                })
            })
            .then(() =>self.clients.claim())
    )
})

self.addEventListener('fetch', e => {
    e.respondWith(
        caches.match(e.request)
            .then(res => {
                if (res) {
                    return res
                }
                return fetch(e.request)
            })
    )
})

