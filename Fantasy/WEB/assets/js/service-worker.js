importScripts('https://ssl.widgets.webengage.com/js/service-worker.js?_=' + Math.floor(Date.now() / 86400000));
importScripts('https://unpkg.com/workbox-sw@2.1.2/build/importScripts/workbox-sw.prod.v2.1.2.js');

const workboxSW = new self.WorkboxSW({
	cacheId: 'tb',
	skipWaiting: true,
	clientsClaim: true
});

workboxSW.precache([
	'//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
	'//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
	'//ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular.min.js',
	'//ajax.googleapis.com/ajax/libs/angularjs/1.3.20/angular-route.min.js',
	'//cdn.jsdelivr.net/bootbox/4.2.0/bootbox.min.js',
	'//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js',
	'//cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/7.2.2/lazyload.transpiled.min.js'
]);

workboxSW.precache([
  {
    "url": "assets/style/tb/css/about-career.bf6f900d348258241a33727e55022a60.css",
    "revision": "6ca1f438b01b470cf101a0c5fb21bf2b"
  },
  {
    "url": "assets/style/tb/css/android-signon.e1a8cdfc2b11f511927aae61d2f6afb4.css",
    "revision": "a0f8516dc46af1bd84bf1a6fe81e6db6"
  },
  {
    "url": "assets/style/tb/css/dashboard.e4afd468cc68441e8adf9de7970ad2e0.css",
    "revision": "376ad4c6c0616ea3c87d840e6bf45fcd"
  },
  {
    "url": "assets/style/tb/css/for-static-pages.f0100851a1ea8dfb401d04e1dff69191.css",
    "revision": "bbd835594840e40808890e8f6bcdd8f7"
  },
  {
    "url": "assets/style/tb/css/gate-scholarships.19e4dcedaccb51419e775a650c2a9b26.css",
    "revision": "3d52f3e02e0d2a6d0dc10da47b36df25"
  },
  {
    "url": "assets/style/tb/css/landing-page.329f6bf92813eb278d97bdafb9ed20cf.css",
    "revision": "c46b3f08e56fd03d15fe6c26a0fac6e6"
  },
  {
    "url": "assets/style/tb/css/mocktest-new.6060d2f0d6c117e63d78b8587d75ab07.css",
    "revision": "a5618f5e05eda71fffc1620d00e41381"
  },
  {
    "url": "assets/style/tb/css/payment-receipt.32dc34fbc1731ba3e28a1ae3deb9e518.css",
    "revision": "b0f4cebf0f05b06bb5b299c406da03cb"
  },
  {
    "url": "assets/style/tb/css/practice.69af942ce80269e0ab42639dd44b61ab.css",
    "revision": "6cc0c1888bd9481546126e3870639d30"
  },
  {
    "url": "assets/style/tb/css/quiz.219808768c074647c4454233d1b1af5f.css",
    "revision": "48f6a19f2c25d53b5afe0c4e234415df"
  },
  {
    "url": "assets/style/tb/css/referrals.eaea2779abfdfaf247c49e06279c1c9f.css",
    "revision": "d379a0d28f7807093fe2e7bc45bdf189"
  },
  {
    "url": "assets/style/tb/css/settings.9b7dca82e187c94245b6cc18a14c962f.css",
    "revision": "f60ff1b66686dd065d7f415a37786424"
  },
  {
    "url": "assets/style/tb/css/style.729a9d5ee4564ff03d049a7affb63492.css",
    "revision": "afba880b6f1000ac69299cb549b1e4d4"
  },
  {
    "url": "assets/style/tb/css/test-analysis.3b13e2a44fccdaa0ba05037fbe2ff414.css",
    "revision": "04901c5d2bc19b377477d44ebd376840"
  },
  {
    "url": "assets/style/tb/css/test-taking-page.14acd1776b71c6036c59635bfa4533eb.css",
    "revision": "05704ee7e64668794f6b954859581c7d"
  },
  {
    "url": "assets/style/tb/css/transactions.01af9bb70eba28aceee9bcc845fb8a8c.css",
    "revision": "dbbd98401d1a9d02ea76a11f8f7a571f"
  },
  {
    "url": "assets/style/tb/css/vyaktitva-tli.59964bf4683196e6a386ab3398738389.css",
    "revision": "dad0d9848d858d6488f59796e7eead06"
  },
  {
    "url": "js/about-us-concat.55f2864af1501adfa51c60f27e81ac8a.js",
    "revision": "a47ccae033702d450ab973f6d7f1b8e9"
  },
  {
    "url": "js/android-on-boarding-concat.19c548a0250301553eb981c1a3791fe4.js",
    "revision": "1582e5cba5b7fce3db2a3dd15aae7c78"
  },
  {
    "url": "js/announcement.js",
    "revision": "712e8d2000b70938e7b731fc04601547"
  },
  {
    "url": "js/aup-concat.35cf44b14f07e38d2b6ddc7f73aba123.js",
    "revision": "7958a184ac895c742d53761190a05106"
  },
  {
    "url": "js/careers-concat.bac3099f884899a450a4b01cb0b5e330.js",
    "revision": "f3f9d7f71b7e160a1ad770042a801a4a"
  },
  {
    "url": "js/careers-jobs-concat.edf575c81efe26f88dcbb00e3d0c6129.js",
    "revision": "4e3a5715b097e5057f6427089e14ee1a"
  },
  {
    "url": "js/common.85187de9a559e6715ad048c1761a4be1.js",
    "revision": "edb49eed3505b32747d30143c70422d0"
  },
  {
    "url": "js/coupon-partners-concat.e9640b68c30cd0a1d73546702a10baab.js",
    "revision": "8cf5ad2f08738ef5f8aeb8db9d8a7f62"
  },
  {
    "url": "js/course-concat.67fa128b319bf042852fb85ac1c24f16.js",
    "revision": "76018b59eeaf10ea243e4f44fdba1fbd"
  },
  {
    "url": "js/dashboard-concat.e1ff39bcdc6aef8d33fbce1b46606b7b.js",
    "revision": "79225a9a6887a2581c4ef74dee434f91"
  },
  {
    "url": "js/defer.b0a0f827ae780e5363ac4a8fa45a8f26.js",
    "revision": "13f00e5d658f3a27b46044150ecf12a3"
  },
  {
    "url": "js/email-message.d5fa9cbb47a6ab7ccfd0592b22d8e1f7.js",
    "revision": "c7f38066c0cdc38ea5e5ef3dd5b9ed5c"
  },
  {
    "url": "js/exam-concat.13c25494ddf8d7fa8e25a701960e2742.js",
    "revision": "f08d43b7e9a15327ecf5042f7f2059a1"
  },
  {
    "url": "js/gate-scholarships-concat.709088e357c804811d6f493a42c75a24.js",
    "revision": "15160fd5cc3705c539b4d1ef4dc0ebf6"
  },
  {
    "url": "js/gate-solutions-promotion-concat.1156b1744df867199383a89e72998e99.js",
    "revision": "fbeffc3de9ca067225a6b89f8c8c93f8"
  },
  {
    "url": "js/group-courses-concat.dbff7ea51c8cd42842d0737ffbd8812d.js",
    "revision": "1e19ca9b870e220c05f7f990ff30d11a"
  },
  {
    "url": "js/homepage-concat.6487e598fb883c3b877290350b5548bf.js",
    "revision": "854aebc5381cbba0acac4d12b65fe458"
  },
  {
    "url": "js/leads-concat.f2de2c77ed40aec9103524e39533a84d.js",
    "revision": "7dc834063de901b5f76c2e416e77a595"
  },
  {
    "url": "js/message-concat.8b2705343f58f5d2775d75ce67e7f8b9.js",
    "revision": "f81488ec0c3efcb3405c32bb8d210eb8"
  },
  {
    "url": "js/mocktest-concat.a08e49c7f4a0f4612fef5c1aa2ce2cac.js",
    "revision": "867c65a584300497b4b245830456ced5"
  },
  {
    "url": "js/news-concat.da9564ee0bd7e73ac67cf45eb4c4bbc5.js",
    "revision": "7bb6f7333e8638ab5586c5618b134e9f"
  },
  {
    "url": "js/ng-file-upload.min.e7b957fa46f772c90d93c799bdffc208.js",
    "revision": "5f9f0b354a9ac48183a963e483de1b20"
  },
  {
    "url": "js/oauth2.439409c2ed9239e91efdfd8e0f32b49a.js",
    "revision": "8c5a80c755c6930894e112c192b134a9"
  },
  {
    "url": "js/offers-concat.697ffc495577fe409681585699ead26f.js",
    "revision": "b284df0df308b679886d0cab023c24ea"
  },
  {
    "url": "js/on-boarding-concat.ca6a53e564c9c469d79cb420e1d0206a.js",
    "revision": "84b50257205101f8624bda5f5be3da94"
  },
  {
    "url": "js/paymentReceipt.a56ebc34dfcec357f0509b023aca2601.js",
    "revision": "d46dff56d55bdf219cdc7dc9ed372cfc"
  },
  {
    "url": "js/pp-concat.65d4a4f38bfd698b0cade8f20cf14a85.js",
    "revision": "f845a67a44b2464546166fbddac4c685"
  },
  {
    "url": "js/practice-concat.61df8518c2c581dbd5bfa0013b7d9e21.js",
    "revision": "ed07b0b68fed94684f8485b3181744e6"
  },
  {
    "url": "js/promotions-concat.379673064b8065e1c47883be0410d1a1.js",
    "revision": "f63400541725def964d915d088928055"
  },
  {
    "url": "js/quiz-concat.1c3d837ac3cb5d07af43a2e86820dde3.js",
    "revision": "3ba530e757022203673bf64c8c9f4f81"
  },
  {
    "url": "js/redeem-coupons-concat.5e2922a51bbfe7e4ae0df67de82f4d9a.js",
    "revision": "f13da338cf1ca380ee1e9270c0b800bf"
  },
  {
    "url": "js/referrals-concat.de73f88b2fc14db9e0da0fd550175ede.js",
    "revision": "5d8d30eb151c7ddb47087a36c2dd626c"
  },
  {
    "url": "js/register-concat.9cc4b8a7e2c5c08f17c1b3879a85dc20.js",
    "revision": "f6126de6756a858ae673160a1c6e7ccf"
  },
  {
    "url": "js/replay-concat.19b37e53b2605185dd14fb2776cf7505.js",
    "revision": "0e6454a45070b72e9718bad8eab62d4b"
  },
  {
    "url": "js/reported-questions-concat.e1bd1388ab40005d96d1dcffdecebe5b.js",
    "revision": "fb919e14b17990042e7bfd066a8a142e"
  },
  {
    "url": "js/saved-questions-concat.e1bd1388ab40005d96d1dcffdecebe5b.js",
    "revision": "fb919e14b17990042e7bfd066a8a142e"
  },
  {
    "url": "js/SBIClerkResult-concat.6c7532d88579fbbfa463d9cd2985c6f4.js",
    "revision": "0fa5363f61988fb2569af1163c371c81"
  },
  {
    "url": "js/seo.a6697ad5fe244822dd9ef292080e501f.js",
    "revision": "4d87616f5b06ed205ad52d6025ad7d8b"
  },
  {
    "url": "js/settings_new-concat.c0a9da7308c8e0549cd10f8627c85756.js",
    "revision": "2b2a74f1bcd764ce05e7f014bb011779"
  },
  {
    "url": "js/sitemap-concat.ada9129608074cf3a197751725158069.js",
    "revision": "65e0372fe0bf35d074bfcea7266b9960"
  },
  {
    "url": "js/SscCglResult-concat.20324818fa7d8d55dde44fa70fd95fa5.js",
    "revision": "17d0e73637a5074a4b028aa04228f964"
  },
  {
    "url": "js/subscription-plans-concat.68ddd48469a83a71d1f0f047850f8180.js",
    "revision": "f1eef57dcf446d2357078cc513128ed7"
  },
  {
    "url": "js/tb-sdk.59ff4676295250001bc818f3c1bffab0.js",
    "revision": "a89c9ebe9996dbf8b8d8f9bbc97434ff"
  },
  {
    "url": "js/test-analysis-concat.ab891bfdc65654002447af1ee9e550bd.js",
    "revision": "3f8eee83b82586d567bad00a2c0e1940"
  },
  {
    "url": "js/test-concat.8e97695d80cfa6553e66aae439733ac6.js",
    "revision": "4cdfcda8c59d1f01b23d62fd99b425ff"
  },
  {
    "url": "js/test-service.ebe94c093d13391a9ad20580a74340c8.js",
    "revision": "dd533a1323e4c5a56de634dc33404d19"
  },
  {
    "url": "js/tos-concat.4220402c3f8a5babc913e2faa01591bf.js",
    "revision": "44064ca941fe6df2c3bccb11db1b7b48"
  },
  {
    "url": "js/transactions-concat.5290af01dbb4af9f7c003c6746754653.js",
    "revision": "dd334da58d19efe956762055757c910e"
  },
  {
    "url": "js/viewport.8db13de9210f5ca705f4756eba2f3dcd.js",
    "revision": "2f6e4b9b82077aa962aa1a13a889fc4d"
  },
  {
    "url": "js/vyaktitva-tli-concat.9eb42ae5a94f6194bea202adc2734787.js",
    "revision": "9f4ecbf991a4b6bb708b7f67bc38cf1c"
  },
  {
    "url": "livetest/views/partials/instructions.html",
    "revision": "25ea40c7e0834b8a8c49987f06eaaf6c"
  },
  {
    "url": "livetest/views/partials/livetest-timer.html",
    "revision": "c39bb003bc8033c377f64691ac1757e5"
  },
  {
    "url": "livetest/views/partials/solutions.html",
    "revision": "7cf17f5804c6aa94dd62015c85ab4d16"
  },
  {
    "url": "livetest/views/partials/test.html",
    "revision": "65525e6c12f93dde11df0786fea1d30a"
  },
  {
    "url": "views/partials/calculator.html",
    "revision": "736de09398be03d6715e3f291ad22b4b"
  },
  {
    "url": "views/partials/cart-template.html",
    "revision": "da8bffb218cce49a76e92405cbab1450"
  },
  {
    "url": "views/partials/components/bookmarks.html",
    "revision": "2ed041b648062b024fb77e15de52ded0"
  },
  {
    "url": "views/partials/components/mobile-verification-template.html",
    "revision": "0241e37234832694a39a61727b6a2824"
  },
  {
    "url": "views/partials/components/practice-chapter-widget.html",
    "revision": "f5f02d585e5cc933b847b59f7d93cd44"
  },
  {
    "url": "views/partials/components/product-card-widget.html",
    "revision": "030851311939a7d29efe5792b6256f89"
  },
  {
    "url": "views/partials/components/report-cta.html",
    "revision": "f423541235354c64cbec07dd2df39237"
  },
  {
    "url": "views/partials/components/subfooter-seo.html",
    "revision": "b04f5a2efbea7975e02d61f2b15b2eed"
  },
  {
    "url": "views/partials/message/create-account.html",
    "revision": "b8f0cb1e27e7b94a7e76e743874ac354"
  },
  {
    "url": "views/partials/message/mail-confirmation.html",
    "revision": "84648919e6b4ee7521191a9d99df6ea5"
  },
  {
    "url": "views/partials/mocktest/admitCardInfo.html",
    "revision": "0bf02c9d4a5180187567acb016adf98d"
  },
  {
    "url": "views/partials/mocktest/bundleDetails.html",
    "revision": "58f9bca33e9baba78097d006f3fedc54"
  },
  {
    "url": "views/partials/mocktest/calculate-savings.html",
    "revision": "21fd2110f7182c0357aeb257134b234d"
  },
  {
    "url": "views/partials/mocktest/courseDetails.html",
    "revision": "94451f29413e4a490657156bf8891868"
  },
  {
    "url": "views/partials/mocktest/liveTestSyllabus.html",
    "revision": "5831eba948798856f0aa1ab650609e20"
  },
  {
    "url": "views/partials/mocktest/pack-release-plan.html",
    "revision": "87211e6c79f6df35210f19e92ceefbe3"
  },
  {
    "url": "views/partials/mocktest/renew-subscription.html",
    "revision": "8804d38e68a13a67cab452a2c315594c"
  },
  {
    "url": "views/partials/mocktest/subscription-helper.html",
    "revision": "1ece06c1e1806238f448b8cb9c0b8b09"
  },
  {
    "url": "views/partials/mocktest/test-release-plan.html",
    "revision": "98889bc8f1b024be67a983a077ef6138"
  },
  {
    "url": "views/partials/mocktest/testAddedStatus.html",
    "revision": "1027b3e2e0c91298d7a27dac26a166ee"
  },
  {
    "url": "views/partials/mocktest/testInstructions.html",
    "revision": "624eba284ff08de039aaf437740ddb16"
  },
  {
    "url": "views/partials/mocktest/trackConversions.html",
    "revision": "82fb280392a620bdaa9be2459e0dff39"
  },
  {
    "url": "views/partials/on-boarding/collect-info.html",
    "revision": "fea9ea9c866589cbc63e91d537ecde3e"
  },
  {
    "url": "views/partials/on-boarding/enrollment.html",
    "revision": "9f8773b58593aed240a9749f33b8a8f4"
  },
  {
    "url": "views/partials/on-boarding/on-boarding.html",
    "revision": "7d0c63498a317a7f92d86416a3620ac6"
  },
  {
    "url": "views/partials/on-boarding/password-reset.html",
    "revision": "91c12c171d62f7092fe9ec08e49ad663"
  },
  {
    "url": "views/partials/paytm-seamless.html",
    "revision": "3aa11ca23d45de6e2ad7c54f3c934e58"
  },
  {
    "url": "views/partials/practice/analysis.html",
    "revision": "f124d11ccd51f95f556294f6ce520e54"
  },
  {
    "url": "views/partials/practice/bookmarks.html",
    "revision": "08d6ebef02169380e8958cd61ba11d12"
  },
  {
    "url": "views/partials/practice/chapterAnalysis.html",
    "revision": "46f24b7d09c017137515083895babcff"
  },
  {
    "url": "views/partials/practice/listview.html",
    "revision": "4e992c30a23506449d68dd831c57010c"
  },
  {
    "url": "views/partials/practice/question.html",
    "revision": "ea7e9b74fdb46e304f754fdd28eeb07f"
  },
  {
    "url": "views/partials/quiz/analysis.html",
    "revision": "2d4be7d576ea276aff0b307d865f8ba3"
  },
  {
    "url": "views/partials/quiz/quiz.html",
    "revision": "2f73ef418d33611c0e4e9cfbad6a6a84"
  },
  {
    "url": "views/partials/quiz/solution.html",
    "revision": "5003c31c63bd7e0af824bb89332fef64"
  },
  {
    "url": "views/partials/test/instructions.html",
    "revision": "49176b78ee7141413081d058849e3640"
  },
  {
    "url": "views/partials/test/interface.html",
    "revision": "c3d829b22d7f06c592582d4d1cdf61cf"
  },
  {
    "url": "views/partials/test/modal.html",
    "revision": "cbc9e23b5fa92f9287eaea1e86639a24"
  },
  {
    "url": "views/partials/test/solutions.html",
    "revision": "3773cafc3c68ac23bc0895481781bbc4"
  },
  {
    "url": "views/partials/test/test.html",
    "revision": "9dcac7e6492dec4f9c2a344991cd1b0e"
  },
  {
    "url": "views/partials/test/timer.html",
    "revision": "7eacf0b9a2da4d1942cc2206eb5132bd"
  },
  {
    "url": "views/partials/vault-questions/question.html",
    "revision": "a221ab2fc79d187f7f9c88582715ccfd"
  },
  {
    "url": "views/partials/vault-questions/questions-list.html",
    "revision": "e94c87726456fb8ecbcc8100ac442f3a"
  }
]);

workboxSW.router.registerRoute(
	new RegExp('\/assets\/img\/(.*)'),
	workboxSW.strategies.cacheFirst({
		cacheName: 'image-cache',
		cacheableResponse: {
			statuses: [0, 200]
		},
		expiration: {
			maxEntries: 50
		}
	})
);

workboxSW.router.registerRoute(
	new RegExp('https:\/\/fonts.(googleapis|gstatic).com\/(.*)'),
	workboxSW.strategies.cacheFirst({
		cacheName: 'fonts-cache',
		cacheableResponse: {
			statuses: [0, 200]
		}
	})
);
