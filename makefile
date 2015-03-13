.PHONY: all clean make-dir copy build
 
all: clean make-dir copy build
 
clean:
	rm -rf dist

make-dir:
	mkdir dist

copy:
	cp -r css dist/css
	cp -r js dist/js
	cp -r images dist/images

build:
	php index.php > dist/index.html
