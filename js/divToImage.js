var DivsToJPG = function( parent ) {
    this.canvasSizeX = 0;
    this.canvasSizeY = 0;
    this.init = function( parent ) {
        this.images = parent.find('img');
        this.setSizes();
        this.createCanvas();
        this.drawImages();
        this.exportJPG();
    }
    
    this.setSizes = function() {
        for (var i = 0, l = this.images.length; i < l ; i++) {
            var currentImage = this.images.eq(i);
            var posX = currentImage.position().left;
            var width = currentImage.width();
            this.canvasSizeX = this.canvasSizeX > (posX+width) ? this.canvasSizeX : posX + width;
            //console.log(this.canvasSizeX);
            var posY = currentImage.position().top;
            var height = currentImage.height();
            this.canvasSizeY = this.canvasSizeY > (posY+height) ? this.canvasSizeY : posY + height;
            
        }
    }
    
    this.createCanvas = function() {
        this.canvas = document.createElement('canvas');
        this.canvas.id     = "exportCanvas";
        this.canvas.width  = this.canvasSizeX;
        this.canvas.height = this.canvasSizeY;
        this.ctx = this.canvas.getContext("2d");
        //document.body.appendChild(this.canvas);
    }
    
    this.drawImages = function() {
        for (var i = 0, l = this.images.length; i < l ; i++) {
            var currentImage = this.images[i];
            var $currentImage = this.images.eq(i);
            this.ctx.drawImage(currentImage, $currentImage.position().left, $currentImage.position().top, $currentImage.width(), $currentImage.height());
        }
    }
    
    this.exportJPG = function() {
        var dataURL = this.canvas.toDataURL();
        this.img = document.createElement('img');
        this.img.id = "createdImage";
        this.img.src     = dataURL; 
        //document.getElementById('creadImageContainer').appendChild(this.img);
        //creadImageContainer.appendChild(this.img);
        return this.img;
    }
    
    this.init( parent );
}