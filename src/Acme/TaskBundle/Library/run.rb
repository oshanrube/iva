require File.dirname(__FILE__)+'/chronic'

Time.now   #=> Sun Aug 27 23:18:25 PDT 2006

my_string = Chronic.parse(ARGV).to_i            #.strftime('%B %d, %Y %H:%M:%S GMT%z')
print my_string;