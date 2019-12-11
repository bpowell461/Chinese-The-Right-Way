# The script of the game goes in this file.

# Declare characters used by this game. The color argument colorizes the
# name of the character.
init:
    $ style.default.font = "chinesefont.ttf"
define quickFade =Fade(0.0, 0.0, 0.5)
define xu = Character("Xu Wei")
define admin = Character("Xu Wei")
# The game starts here.

label start:
    # Show a background. This uses a placeholder by default, but you can
    # add a file (named either "bg room.png" or "bg room.jpg") to the
    # images directory to show it.

    scene bg town
    with None
    # This shows a character sprite. A placeholder is used, but you can
    # replace it by adding a file named "eileen happy.png" to the images
    # directory.

    show xu wei at right
    with moveinright
    with dissolve
    # These display lines of dialogue.

    xu "Hello! My name is XU WenChang."

    xu "I am from China."

    xu "Today, we are going to learn the story of Hua Mulan"

    xu "Now, in order to understand the story, we must look at the anatomy of scripts."

    hide xu wei

    show char1 at truecenter with dissolve

    admin "The first symbol is 我 ,which means I, or me."
    admin "The stroke order goes as follows"
    hide char1

    show canvas at truecenter with dissolve
    show char1stroke1 at truecenter with dissolve
    admin "First Stroke"
    show char1stroke2 at truecenter with dissolve
    admin "Second Stroke"
    show char1stroke3 at truecenter with dissolve
    admin "Third Stroke"
    show char1stroke4 at truecenter with dissolve
    admin "Fourth Stroke"
    show char1stroke5 at truecenter with dissolve
    admin "Fifth Stroke"
    show char1stroke6 at truecenter with dissolve
    admin "Sixth Stroke"
    show char1complete at truecenter with dissolve
    admin "Final Stroke"


    # This ends the game.

    return
