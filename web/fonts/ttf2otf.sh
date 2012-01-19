#!/usr/local/bin/fontforge
# Convert an OTF font int TTF an EOT formats.
Open($1);
Generate($1:r+".otf");
Quit(0);
