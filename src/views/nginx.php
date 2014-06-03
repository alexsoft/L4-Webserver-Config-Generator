server {
	server_name <?=$serverName?>;
	listen 80;

	access_log <?=$logsPath?>/access.log;
	error_log  <?=$logsPath?>/error.log;
	rewrite_log on;

	root <?=public_path()?>;
	index index.php;

	location / {
		try_files $uri /index.php?$query_string;
	}

	if (!-d $request_filename) {
		rewrite ^/(.*)/$ /$1 permanent;
	}

	location ~ \.php$ {
		fastcgi_pass <?=$fastcgiPass?>;
		fastcgi_index index.php;
		fastcgi_split_path_info ^(.+\.php)(.*)$;
		include fastcgi_params;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
	}

	location ~ /\.ht {
		deny all;
	}
}