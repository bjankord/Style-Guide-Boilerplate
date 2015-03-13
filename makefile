.PHONY: all clean make-dir copy create-html
 
all: clean make-dir copy create-html
 
clean:
	rm -rf dist

make-dir:
	mkdir dist

copy:
	cp -r css dist/css
	cp -r js dist/js
	cp -r images dist/images

create-html:
	php index.php > dist/index.html
