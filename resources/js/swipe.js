export default class CustomSwipe {
    
    constructor(id, swipeLeftFunct, swipeRighFunct) {

        this.xDown = null;
        this.yDown = null;
        this.listener = id;
        this.swipeLeftFunct = swipeLeftFunct;
        this.swipeRighFunct = swipeRighFunct;
    }

    init() {
        let swipeContainer = document.getElementById(this.listener);
        let obj = this;        
        
        swipeContainer.addEventListener('touchstart', function(evt) {
            obj.handleTouchStart(evt, obj);
        }, false);      

        swipeContainer.addEventListener('touchmove', function(evt) {
            obj.handleTouchMove(evt, obj);
        }, false);
    }

    handleTouchStart(evt, self) {
        const firstTouch = (evt.touches || evt.originalEvent.touches)[0];                                      
        self.xDown = firstTouch.clientX;                                      
        self.yDown = firstTouch.clientY;                                      
    }


    handleTouchMove(evt, self) {

        if ( ! self.xDown || ! self.yDown ) {
            return;
        }

        var xUp = evt.touches[0].clientX;                                    
        var yUp = evt.touches[0].clientY;

        var xDiff = self.xDown - xUp;
        var yDiff = self.yDown - yUp;

        if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {
            
            if ( xDiff > 0 ) {
                self.swipeRighFunct(xDiff);
            } else {
                self.swipeLeftFunct(xDiff);
            }
                                
        } else {
            if ( yDiff > 0 ) {
                        /* up swipe */ 
            } else { 
                        /* down swipe */
            }              
        }
                /* reset values */
        self.xDown = null;
        self.yDown = null;                                             
    }
}