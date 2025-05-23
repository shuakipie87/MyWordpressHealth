jQuery(document).ready(function(u){
	function t(t) {
		t.classList.toggle("active")
	}
}),
function() {
	var a = ".drift-open-chat";
	function t(t) {
		"loading" != document.readyState ? t() : document.addEventListener ? document.addEventListener("DOMContentLoaded", t) : document.attachEvent("onreadystatechange", function() {
			"loading" != document.readyState && t()
		})
	}

	function i(t, e) {
		for (var a = document.querySelectorAll(t), i = 0; i < a.length; i++) e(a[i], i)
	}

	function n(t, e) {
		return e.preventDefault(), t.sidebar.open(), !1
	}
	t(function() {
		drift.on("ready", function(t) {
			var e = n.bind(this, t);
			i(a, function(t) {
				t.addEventListener("click", e)
			})
		})
	})
}();
