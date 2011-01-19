if ('function' == typeof wpautop) {
	old_wpautop = wpautop;
	
	function safe_autop(output) {
		if ( output.length == 0 ) {
			return output;
		}
		
		if ( output.indexOf("<pre") == -1 ) {
			return old_wpautop(output);
		} else if ( output.indexOf("<pre") == 0 ) {
			var pos;
			var parts = new Array();
			pos = output.indexOf("</pre>");
			parts.push(output.slice(0, pos+6));
			parts.push(output.slice(pos+6));
			return parts[0].concat( safe_autop(parts[1]) );
		} else {
			var pos;
			var parts = new Array();
			pos = output.indexOf("<pre>");
			parts.push(output.slice(0, pos));
			parts.push(output.slice(pos));
			return safe_autop(parts[0]).concat( safe_autop(parts[1]) );
		}
		
		return output;	
	}
	
	wpautop = safe_autop;
}