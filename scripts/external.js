function createExternalLinks() {
	$each($$("a"), function(anchor, index) {
		if (anchor.rel && anchor.href &&
			anchor.rel.contains('external', ' ')) {
			anchor.setProperty('target','_blank');
		}	
	});
}