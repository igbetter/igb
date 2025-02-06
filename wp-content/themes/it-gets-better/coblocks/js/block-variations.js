( function( blocks ) {
    const { registerBlockVariation } = blocks;
    
    // Helper function to format the counter text
    const formatCounterText = (value, preserveFormatting = false, existingText = '') => {
        if (preserveFormatting && existingText.includes('\u003cstrong\u003e')) {
            return `\u003cstrong\u003e${value}\u003c/strong\u003e`;
        }
        return value;
    };
    
    registerBlockVariation('coblocks/counter', {
        name: 'pledge-counter',
        title: 'Pledge Counter',
        description: 'Display the current pledge count',
        attributes: {
            counterText: `\u003cstrong\u003e${igbBlockData.pledgeCount}\u003c/strong\u003e`,
            isPledgeCounter: true
        },
        isActive: attributes => attributes.isPledgeCounter === true,
        transforms: {
            from: [{
                type: 'block',
                blocks: ['coblocks/counter'],
                transform: attributes => {
                    return blocks.createBlock('coblocks/counter', {
                        ...attributes,
                        counterText: `\u003cstrong\u003e${igbBlockData.pledgeCount}\u003c/strong\u003e`,
                        isPledgeCounter: true
                    });
                }
            }]
        },
        isDefault: false,
        scope: ['inserter', 'transform']
    });
} )( window.wp.blocks ); 