module Jekyll

  class Version < Liquid::Tag
    
    def initialize(tag_name, markup, tokens)
       super
    end

    def render(context)
      "#{Time.now.to_i}"
    end
  end
end

Liquid::Template.register_tag('version', Jekyll::Version)